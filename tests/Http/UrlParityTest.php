<?php

it('keeps the legacy public routes', function (string $path, int $status, ?string $location = null) {
    $response = request($path);

    expect($response['status'])->toBe($status)
        ->and($response['location'])->toBe($location === null ? null : url($location));
})->with([
    ['/', 200],
    ['/rolunk', 200],
    ['/rolunk/', 301, '/rolunk'],
    ['/egyesuletek', 200],
    ['/egyesuletek/', 301, '/egyesuletek'],
    ['/dokumentumok', 302, '/'],
    ['/dokumentumok/', 302, '/'],
    ['/dokumentumok/teszt-szabalyzatok', 200],
    ['/dokumentumok/teszt-szabalyzatok/', 301, '/dokumentumok/teszt-szabalyzatok'],
    ['/versenynaptar', 200],
    ['/versenynaptar/', 301, '/versenynaptar'],
    ['/kapcsolat', 200],
    ['/kapcsolat/', 301, '/kapcsolat'],
    ['/hirek', 200],
    ['/hirek/', 301, '/hirek'],
    ['/hirek/teszt-hir-16', 200],
    ['/hirek/teszt-hir-16/', 301, '/hirek/teszt-hir-16'],
    ['/studio', 301, '/wp/wp-admin/'],
    ['/studio/', 301, '/wp/wp-admin/'],
    ['/studio/posts/12/edit', 301, '/wp/wp-admin/'],
    ['/up', 404],
    ['/szabalyzatok', 404],
    ['/versenykiirasok', 404],
]);
