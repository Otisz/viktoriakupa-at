<?php

it('outputs the Yoast title and Open Graph tags on every page type', function (string $path, string $title) {
    $body = request($path)['body'];

    expect($body)->toContain("<title>{$title}</title>")
        ->and($body)->toContain("<meta property=\"og:title\" content=\"{$title}\" />")
        ->and($body)->toContain('<meta property="og:url" content="' . url($path) . '" />')
        ->and($body)->toMatch('/<meta property="og:image" content="[^"]+\/app\/uploads\/[^"]+\.png" \/>/');
})->with([
    'front page' => ['/', 'Kezdőlap - Viktória Kupa'],
    'Posts' => ['/hirek', 'Hírek - Viktória Kupa'],
    'Post' => ['/hirek/teszt-hir-15', 'Teszt hír 15 - Viktória Kupa'],
    'Page' => ['/rolunk', 'Rólunk - Viktória Kupa'],
    'Clubs' => ['/egyesuletek', 'Egyesületek - Viktória Kupa'],
    'Document Type' => ['/dokumentumok/teszt-szabalyzatok', 'Teszt szabályzatok - Viktória Kupa'],
]);
