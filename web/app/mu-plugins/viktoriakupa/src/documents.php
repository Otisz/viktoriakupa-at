<?php

namespace ViktoriaKupa;

use WP_Query;

add_action('init', function (): void {
    register_post_type('document', [
        'labels' => [
            'name' => 'Dokumentumok',
            'singular_name' => 'Dokumentum',
            'add_new_item' => 'Új dokumentum',
            'edit_item' => 'Dokumentum szerkesztése',
        ],
        'public' => false,
        'show_ui' => true,
        'rewrite' => false,
        'query_var' => false,
        'menu_icon' => 'dashicons-media-document',
        'supports' => ['title'],
    ]);

    register_taxonomy('document_type', 'document', [
        'labels' => [
            'name' => 'Dokumentumtípusok',
            'singular_name' => 'Dokumentumtípus',
            'add_new_item' => 'Új dokumentumtípus',
            'edit_item' => 'Dokumentumtípus szerkesztése',
        ],
        'public' => true,
        'show_admin_column' => true,
        'meta_box_cb' => false,
        'rewrite' => ['slug' => 'dokumentumok', 'with_front' => false],
    ]);
});

add_action('pre_get_posts', function (WP_Query $query): void {
    if ($query->is_main_query() && $query->is_tax('document_type')) {
        $query->set('post_type', 'document');
        $query->set('nopaging', true);
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
});

// A Document Type's list is unpaginated, and its feed would link Documents, which have no URL of their own
add_action('template_redirect', function (): void {
    global $wp_query;

    if (is_tax('document_type') && (is_feed() || is_paged())) {
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
    }
}, 1);

add_filter('feed_links_extra_show_tax_feed', fn(bool $show): bool => $show && ! is_tax('document_type'));
