<?php

it('lists the Document Type\'s Documents by title at /dokumentumok/{slug}', function () {
    $response = request('/dokumentumok/teszt-szabalyzatok');

    expect($response['status'])->toBe(200)
        ->and(array_keys(listedDocuments($response['body'])))->toBe(['Teszt Alapszabály', 'Teszt Nevezési lap', 'Teszt Versenyszabályzat']);
});

it('links each Document to a working download of its file', function (string $slug, string $title) {
    $href = listedDocuments(request('/dokumentumok/teszt-szabalyzatok')['body'])[$title] ?? '';

    expect($href)->toMatch('/\/app\/uploads\/seed\/' . $slug . '\.pdf$/')
        ->and(request(parse_url($href, PHP_URL_PATH))['status'])->toBe(200);
})->with([
    ['teszt-alapszabaly', 'Teszt Alapszabály'],
    ['teszt-nevezesi-lap', 'Teszt Nevezési lap'],
    ['teszt-versenyszabalyzat', 'Teszt Versenyszabályzat'],
]);

it('returns 404 for an unknown Document Type', function () {
    expect(request('/dokumentumok/nincs-ilyen')['status'])->toBe(404);
});

it('returns 404 for a would-be single Document URL', function (string $path) {
    expect(request($path)['status'])->toBe(404);
})->with([
    '/dokumentumok/teszt-szabalyzatok/teszt-alapszabaly',
    '/document/teszt-alapszabaly',
    '/hirek/teszt-alapszabaly',
    '/hirek/document/teszt-alapszabaly',
    '/?post_type=document&name=teszt-alapszabaly',
]);

it('temporarily redirects /dokumentumok to the front page', function (string $path) {
    $response = request($path);

    expect($response['status'])->toBe(302)
        ->and($response['location'])->toBe(url('/'));
})->with([
    '/dokumentumok',
    '/dokumentumok/',
]);

it('permanently redirects /dokumentumok/{slug}/ to the version without a trailing slash', function () {
    $response = request('/dokumentumok/teszt-szabalyzatok/');

    expect($response['status'])->toBe(301)
        ->and($response['location'])->toBe(url('/dokumentumok/teszt-szabalyzatok'));
});

it('has no Document Type feed listing single Document URLs', function (string $path) {
    expect(request($path)['status'])->toBe(404);
})->with([
    '/dokumentumok/teszt-szabalyzatok/feed',
    '/?document_type=teszt-szabalyzatok&feed=rss2',
]);

it('does not advertise a Document Type feed on /dokumentumok/{slug}', function () {
    expect(request('/dokumentumok/teszt-szabalyzatok')['body'])->not->toContain('teszt-szabalyzatok/feed');
});

it('keeps single Document URLs out of the sitemap', function () {
    expect(request('/sitemap_index.xml')['body'])->not->toContain('document-sitemap.xml');
});

it('returns 404 for a paginated Document Type list', function () {
    expect(request('/dokumentumok/teszt-szabalyzatok/page/2')['status'])->toBe(404);
});
