<?php

wp_delete_post(get_page_by_path('hello-world', OBJECT, 'post')->ID ?? 0, true);

$imageId = seedImage('teszt-hir-kiemelt', 800, 450);

foreach (range(1, 16) as $number) {
    $slug = sprintf('teszt-hir-%02d', $number);

    $id = wp_insert_post([
        'ID' => get_page_by_path($slug, OBJECT, 'post')->ID ?? 0,
        'post_type' => 'post',
        'post_status' => 'publish',
        'post_name' => $slug,
        'post_title' => sprintf('Teszt hír %02d', $number),
        'post_date' => sprintf('2026-02-%02d 10:00:00', $number),
        'post_excerpt' => "A {$number}. teszt hír rövid összefoglalója.",
        'post_content' => "<!-- wp:paragraph -->\n<p>A {$number}. teszt hír teljes szövege.</p>\n<!-- /wp:paragraph -->",
    ], true);

    if (is_wp_error($id)) {
        WP_CLI::error("Post {$slug}: {$id->get_error_message()}");
    }

    if ($number === 16) {
        set_post_thumbnail($id, $imageId);
    }

    if ($number === 1) {
        stick_post($id);
    }
}
