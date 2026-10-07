<?php

$menus = [
    'header' => [
        'name' => 'Fejléc',
        'items' => ['Rólunk' => home_url('/rolunk'), 'Hírek' => home_url('/hirek'), 'Egyesületek' => home_url('/egyesuletek')],
    ],
    'footer' => [
        'name' => 'Lábléc',
        'items' => ['Kapcsolat' => home_url('/kapcsolat'), 'Adatkezelés' => 'https://adatkezeles.example.com'],
    ],
];

$locations = [];

foreach ($menus as $location => $menu) {
    $id = wp_get_nav_menu_object($menu['name'])->term_id ?? wp_create_nav_menu($menu['name']);

    if (is_wp_error($id)) {
        WP_CLI::error("Menu {$menu['name']}: {$id->get_error_message()}");
    }

    foreach (wp_get_nav_menu_items($id) ?: [] as $item) {
        wp_delete_post($item->ID, true);
    }

    foreach ($menu['items'] as $title => $url) {
        wp_update_nav_menu_item($id, 0, [
            'menu-item-title' => $title,
            'menu-item-url' => $url,
            'menu-item-status' => 'publish',
        ]);
    }

    $locations[$location] = $id;
}

set_theme_mod('nav_menu_locations', $locations);
