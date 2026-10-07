<?php

add_action('after_setup_theme', function (): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'header' => 'Fejléc',
        'footer' => 'Lábléc',
    ]);
});

add_action('pre_get_posts', function (WP_Query $query): void {
    if ($query->is_main_query() && $query->is_home()) {
        $query->set('ignore_sticky_posts', true);
    }
});
