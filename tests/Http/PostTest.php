<?php

it('renders a Post at its legacy path', function () {
    $response = request('/hirek/teszt-hir-16');

    expect($response['status'])->toBe(200)
        ->and($response['body'])->toContain('<h1>Teszt hír 16</h1>')
        ->and($response['body'])->toContain('<time datetime="2026-02-16T10:00:00+01:00">')
        ->and($response['body'])->toContain('A 16. teszt hír rövid összefoglalója.')
        ->and($response['body'])->toMatch('/<p[^>]*>A 16. teszt hír teljes szövege.<\/p>/');
});

it('returns 404 for an unknown Post slug', function () {
    expect(request('/hirek/ez-a-hir-nem-letezik')['status'])->toBe(404);
});

it('permanently redirects a trailing-slash Post path to the version without it', function (string $path) {
    $response = request($path . '/');

    expect($response['status'])->toBe(301)
        ->and($response['location'])->toBe(url($path));
})->with([
    '/hirek',
    '/hirek/teszt-hir-16',
]);

it('shows the featured image of a Post', function () {
    expect(request('/hirek/teszt-hir-16')['body'])
        ->toMatch('/<img [^>]*src="[^"]*\/app\/uploads\/seed\/teszt-hir-kiemelt[^"]*\.png"[^>]*class="[^"]*wp-post-image/');
});
