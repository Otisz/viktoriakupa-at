<?php

$paragraph = fn(string $text): string => "<!-- wp:paragraph -->\n<p>{$text}</p>\n<!-- /wp:paragraph -->";
$heading = fn(string $text): string => "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">{$text}</h2>\n<!-- /wp:heading -->";

$logo = function (string $name, string $alt): string {
    $uploads = wp_upload_dir();
    $path = "{$uploads['basedir']}/seed/{$name}.png";

    if (! file_exists($path)) {
        wp_mkdir_p(dirname($path));
        imagepng(imagecreatetruecolor(120, 60), $path);
    }

    return "<!-- wp:image -->\n<figure class=\"wp-block-image\"><img src=\"{$uploads['baseurl']}/seed/{$name}.png\" alt=\"{$alt}\"/></figure>\n<!-- /wp:image -->";
};

$pages = [
    'kezdolap' => [
        'title' => 'Kezdőlap',
        'content' => implode("\n\n", [
            $paragraph('Üdvözöljük a Viktória Kupa oldalán!'),
            $heading('Támogatóink'),
            $logo('tamogato', 'Teszt Támogató logó'),
            $heading('Közreműködők'),
            $logo('kozremukodo', 'Teszt Közreműködő logó'),
        ]),
    ],
    'rolunk' => ['title' => 'Rólunk', 'content' => $paragraph('A Viktória Kupa történetéről.')],
    'versenynaptar' => ['title' => 'Versenynaptár', 'content' => $paragraph('Az idei verseny időpontjai.')],
    'kapcsolat' => ['title' => 'Kapcsolat', 'content' => $paragraph('Írjon nekünk a szervezőknek.')],
];

$ids = [];

foreach ($pages as $slug => $page) {
    $id = wp_insert_post([
        'ID' => get_page_by_path($slug)->ID ?? 0,
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_name' => $slug,
        'post_title' => $page['title'],
        'post_content' => $page['content'],
    ], true);

    if (is_wp_error($id)) {
        WP_CLI::error("Page {$slug}: {$id->get_error_message()}");
    }

    $ids[$slug] = $id;
}

update_option('show_on_front', 'page');
update_option('page_on_front', $ids['kezdolap']);
