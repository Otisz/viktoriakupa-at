<?php

it('renders a Page at its legacy path', function (string $path, string $title, string $content) {
    $response = request($path);

    expect($response['status'])->toBe(200)
        ->and($response['body'])->toContain($title)
        ->and($response['body'])->toContain($content);
})->with([
    ['/rolunk', 'Rólunk', 'A Viktória Kupa történetéről.'],
    ['/versenynaptar', 'Versenynaptár', 'Az idei verseny időpontjai.'],
    ['/kapcsolat', 'Kapcsolat', 'Írjon nekünk a szervezőknek.'],
]);

it('permanently redirects a trailing-slash Page path to the version without it', function (string $path) {
    $response = request($path . '/');

    expect($response['status'])->toBe(301)
        ->and($response['location'])->toBe(url($path));
})->with([
    '/rolunk',
    '/versenynaptar',
    '/kapcsolat',
]);
