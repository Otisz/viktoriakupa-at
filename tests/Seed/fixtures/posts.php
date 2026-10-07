<?php

require_once ABSPATH . 'wp-admin/includes/image.php';

wp_delete_post(get_page_by_path('hello-world', OBJECT, 'post')->ID ?? 0, true);

$uploads = wp_upload_dir();
$imagePath = "{$uploads['basedir']}/seed/teszt-hir-kiemelt.png";
$imageId = attachment_url_to_postid("{$uploads['baseurl']}/seed/teszt-hir-kiemelt.png");

if (! $imageId) {
    wp_mkdir_p(dirname($imagePath));
    imagepng(imagecreatetruecolor(800, 450), $imagePath);

    $imageId = wp_insert_attachment(['post_mime_type' => 'image/png', 'post_title' => 'Teszt hír kiemelt kép'], $imagePath);
    wp_update_attachment_metadata($imageId, wp_generate_attachment_metadata($imageId, $imagePath));
}

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
