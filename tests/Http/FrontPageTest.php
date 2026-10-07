<?php

it('renders the front Page content at the root', function () {
    $response = request('/');

    expect($response['status'])->toBe(200)
        ->and($response['body'])->toContain('Üdvözöljük a Viktória Kupa oldalán!');
});

it('shows the sponsor and contributor logos on the front Page', function (string $heading, string $alt) {
    $body = request('/')['body'];

    expect($body)->toContain("<h2 class=\"wp-block-heading\">{$heading}</h2>")
        ->and($body)->toMatch('/<figure class="wp-block-image[^"]*"><img [^>]*alt="' . preg_quote($alt, '/') . '"/');
})->with([
    ['Támogatóink', 'Teszt Támogató logó'],
    ['Közreműködők', 'Teszt Közreműködő logó'],
]);
