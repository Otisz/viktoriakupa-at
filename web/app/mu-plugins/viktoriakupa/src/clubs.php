<?php

namespace ViktoriaKupa;

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
