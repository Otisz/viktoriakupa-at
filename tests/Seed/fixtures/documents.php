<?php

$types = [
    'teszt-szabalyzatok' => 'Teszt szabályzatok',
    'teszt-kiirasok' => 'Teszt kiírások',
];

foreach ($types as $slug => $name) {
    if (! term_exists($slug, 'document_type')) {
        wp_insert_term($name, 'document_type', ['slug' => $slug]);
    }
}

// Inserted out of alphabetical order, so neither date order matches title order
$documents = [
    'teszt-versenyszabalyzat' => ['title' => 'Teszt Versenyszabályzat', 'type' => 'teszt-szabalyzatok', 'date' => '2026-01-03'],
    'teszt-alapszabaly' => ['title' => 'Teszt Alapszabály', 'type' => 'teszt-szabalyzatok', 'date' => '2026-01-02'],
    'teszt-nevezesi-lap' => ['title' => 'Teszt Nevezési lap', 'type' => 'teszt-szabalyzatok', 'date' => '2026-01-01'],
    'teszt-versenykiiras' => ['title' => 'Teszt Versenykiírás', 'type' => 'teszt-kiirasok', 'date' => '2026-01-01'],
];

foreach ($documents as $slug => $document) {
    $id = wp_insert_post([
        'ID' => get_page_by_path($slug, OBJECT, 'document')->ID ?? 0,
        'post_type' => 'document',
        'post_status' => 'publish',
        'post_name' => $slug,
        'post_title' => $document['title'],
        'post_date' => "{$document['date']} 10:00:00",
    ], true);

    if (is_wp_error($id)) {
        WP_CLI::error("Document {$slug}: {$id->get_error_message()}");
    }

    wp_set_object_terms($id, $document['type'], 'document_type');
    update_field('field_document_file', seedPdf($slug), $id);
}
