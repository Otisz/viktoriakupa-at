<?php

namespace ViktoriaKupa;

use WP_Admin_Bar;
use WP_Post_Type;
use WP_Query;

add_action('init', function (): void {
    register_post_type('club', [
        'labels' => [
            'name' => 'Egyesületek',
            'singular_name' => 'Egyesület',
            'add_new_item' => 'Új egyesület',
            'edit_item' => 'Egyesület szerkesztése',
        ],
        'public' => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'has_archive' => 'egyesuletek',
        'rewrite' => ['slug' => 'egyesuletek', 'with_front' => false, 'feeds' => false, 'pages' => false],
        'menu_icon' => 'dashicons-groups',
        'supports' => ['title', 'thumbnail'],
    ]);
});

add_action('pre_get_posts', function (WP_Query $query): void {
    if ($query->is_main_query() && $query->is_post_type_archive('club')) {
        $query->set('nopaging', true);
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
});

// A Club only appears in the /egyesuletek list and has no page or feed of its own
add_action('template_redirect', function (): void {
    global $wp_query;

    if (is_singular('club') || (is_feed() && is_post_type_archive('club'))) {
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
    }
}, 1);

add_filter('feed_links_extra_show_post_type_archive_feed', fn(bool $show): bool => $show && ! is_post_type_archive('club'));

add_filter('wpseo_sitemap_exclude_post_type', fn(bool $excluded, string $postType): bool => $excluded || $postType === 'club', 10, 2);

// wp-admin, including its AJAX (Asynchronous JavaScript and XML) requests, should not link to a single Club page, which is a 404
if (is_admin()) {
    add_filter('is_post_type_viewable', fn(bool $viewable, WP_Post_Type $postType): bool => $viewable && $postType->name !== 'club', 10, 2);
}

add_filter('get_sample_permalink_html', fn(string $html, int $postId): string => get_post_type($postId) === 'club' ? '' : $html, 10, 2);

add_action('admin_bar_menu', function (WP_Admin_Bar $adminBar): void {
    if (is_admin() && get_current_screen()?->post_type === 'club') {
        $adminBar->remove_node('view');
        $adminBar->remove_node('preview');
    }
}, 100);

add_filter('wpseo_accessible_post_types', fn(array $postTypes): array => array_diff($postTypes, ['club']));
