<?php

// Inserted newest-first out of alphabetical order, so neither date order matches name order
$clubs = [
    'teszt-zala-se' => ['title' => 'Teszt Zala SE', 'date' => '2026-01-03', 'website' => 'https://zala.example.com'],
    'teszt-albatrosz-sc' => ['title' => 'Teszt Albatrosz SC', 'date' => '2026-01-02', 'website' => null],
    'teszt-miskolc-te' => ['title' => 'Teszt Miskolc TE', 'date' => '2026-01-01', 'website' => 'https://miskolc.example.com'],
];

foreach ($clubs as $slug => $club) {
    $id = wp_insert_post([
        'ID' => get_page_by_path($slug, OBJECT, 'club')->ID ?? 0,
        'post_type' => 'club',
        'post_status' => 'publish',
        'post_name' => $slug,
        'post_title' => $club['title'],
        'post_date' => "{$club['date']} 10:00:00",
    ], true);

    if (is_wp_error($id)) {
        WP_CLI::error("Club {$slug}: {$id->get_error_message()}");
    }

    set_post_thumbnail($id, seedImage("{$slug}-logo", 200, 200));
    update_field('field_club_website', (string) $club['website'], $id);
}
