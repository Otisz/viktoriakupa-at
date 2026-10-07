<?php

it('returns 404 for unknown paths', function (string $path) {
    expect(request($path)['status'])->toBe(404);
})->with([
    '/ez-az-oldal-nem-letezik',
    '/szabalyzatok',
    '/versenykiirasok',
]);
