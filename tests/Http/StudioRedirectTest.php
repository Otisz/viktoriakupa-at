<?php

it('permanently redirects the legacy admin to the WordPress admin', function (string $path) {
    $response = request($path);

    expect($response['status'])->toBe(301)
        ->and($response['location'])->toBe(url('/wp/wp-admin/'));
})->with([
    '/studio',
    '/studio/anything',
    '/studio/posts/12/edit',
]);
