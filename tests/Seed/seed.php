<?php

/**
 * Idempotent test fixtures, run with `wp eval-file`. Each file in fixtures/
 * must leave the same state no matter how many times it runs.
 */

require_once ABSPATH . 'wp-admin/includes/image.php';

/**
 * Returns the ID of a blank PNG attachment at uploads/seed/{$name}.png, creating it once.
 */
function seedImage(string $name, int $width, int $height): int
{
    $uploads = wp_upload_dir();
    $path = "{$uploads['basedir']}/seed/{$name}.png";
    $id = attachment_url_to_postid("{$uploads['baseurl']}/seed/{$name}.png");

    if (! $id) {
        wp_mkdir_p(dirname($path));
        imagepng(imagecreatetruecolor($width, $height), $path);

        $id = wp_insert_attachment(['post_mime_type' => 'image/png', 'post_title' => $name], $path);
        wp_update_attachment_metadata($id, wp_generate_attachment_metadata($id, $path));
    }

    return $id;
}

$fixtures = glob(__DIR__ . '/fixtures/*.php');
sort($fixtures);

foreach ($fixtures as $fixture) {
    require $fixture;
    WP_CLI::log('Seeded ' . basename($fixture, '.php'));
}
