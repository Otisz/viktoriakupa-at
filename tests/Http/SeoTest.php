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

it('outputs the excerpt as the Yoast meta description', function (string $path, string $description) {
    $body = request($path)['body'];

    expect($body)->toContain("<meta name=\"description\" content=\"{$description}\" />")
        ->and($body)->toContain("<meta property=\"og:description\" content=\"{$description}\" />");
})->with([
    'Post' => ['/hirek/teszt-hir-16', 'A 16. teszt hír rövid összefoglalója.'],
    'Page' => ['/rolunk', 'A Viktória Kupa történetéről.'],
]);
