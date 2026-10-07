<?php

function landmark(string $body, string $tag): string
{
    preg_match("/<{$tag}[ >].*?<\/{$tag}>/s", $body, $match);

    return $match[0] ?? '';
}

function menuLink(string $href, string $title): string
{
    return '/<a href="' . preg_quote($href, '/') . '"[^>]*>' . preg_quote($title, '/') . '<\/a>/';
}

it('renders the menu assigned to the header location in the header', function (string $path) {
    $header = landmark(request($path)['body'], 'header');

    expect($header)->toMatch(menuLink(url('/rolunk'), 'Rólunk'))
        ->and($header)->toMatch(menuLink(url('/hirek'), 'Hírek'))
        ->and($header)->toMatch(menuLink(url('/egyesuletek'), 'Egyesületek'))
        ->and($header)->not->toContain('Adatkezelés');
})->with([
    '/',
    '/kapcsolat',
]);

it('renders the menu assigned to the footer location in the footer', function (string $path) {
    $footer = landmark(request($path)['body'], 'footer');

    expect($footer)->toMatch(menuLink(url('/kapcsolat'), 'Kapcsolat'))
        ->and($footer)->toMatch(menuLink('https://adatkezeles.example.com', 'Adatkezelés'))
        ->and($footer)->not->toContain('Egyesületek');
})->with([
    '/',
    '/kapcsolat',
]);
