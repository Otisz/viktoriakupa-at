<?php

$paragraph = fn(string $text): string => "<!-- wp:paragraph -->\n<p>{$text}</p>\n<!-- /wp:paragraph -->";

$pages = [
    'kezdolap' => ['Kezdőlap', $paragraph('Üdvözöljük a Viktória Kupa oldalán!') . "\n\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Támogatóink</h2>\n<!-- /wp:heading -->"],
    'rolunk' => ['Rólunk', $paragraph('A Viktória Kupa történetéről.')],
    'versenynaptar' => ['Versenynaptár', $paragraph('Az idei verseny időpontjai.')],
    'kapcsolat' => ['Kapcsolat', $paragraph('Írjon nekünk a szervezőknek.')],
];

$ids = [];

foreach ($pages as $slug => [$title, $content]) {
    $page = get_page_by_path($slug, OBJECT, 'page');

    $ids[$slug] = wp_insert_post([
        'ID' => $page->ID ?? 0,
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_name' => $slug,
        'post_title' => $title,
        'post_content' => $content,
    ]);
}

update_option('show_on_front', 'page');
update_option('page_on_front', $ids['kezdolap']);
