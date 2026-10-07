<?php

it('lists all Clubs by name at /egyesuletek', function () {
    $response = request('/egyesuletek');

    expect($response['status'])->toBe(200)
        ->and(array_keys(listedClubs($response['body'])))->toBe(['Teszt Albatrosz SC', 'Teszt Miskolc TE', 'Teszt Zala SE']);
});

it('shows each Club with its logo and a link to its website where set', function (string $slug, string $name, ?string $website) {
    $html = listedClubs(request('/egyesuletek')['body'])[$name] ?? '';

    expect($html)->toMatch('/<img [^>]*src="[^"]*\/app\/uploads\/seed\/' . $slug . '-logo[^"]*\.png"/');

    $website === null
        ? expect($html)->not->toContain('<a ')
        : expect($html)->toContain("<a href=\"{$website}\">{$name}</a>");
})->with([
    ['teszt-albatrosz-sc', 'Teszt Albatrosz SC', null],
    ['teszt-miskolc-te', 'Teszt Miskolc TE', 'https://miskolc.example.com'],
    ['teszt-zala-se', 'Teszt Zala SE', 'https://zala.example.com'],
]);

it('returns 404 for a would-be single Club URL', function (string $path) {
    expect(request($path)['status'])->toBe(404);
})->with([
    '/egyesuletek/teszt-zala-se',
    '/?club=teszt-zala-se',
]);

it('has no Club feed listing single Club URLs', function (string $path) {
    expect(request($path)['status'])->toBe(404);
})->with([
    '/egyesuletek?feed=rss2',
    '/?post_type=club&feed=rss2',
]);

it('does not advertise a Club feed on /egyesuletek', function () {
    expect(request('/egyesuletek')['body'])->not->toContain('feed=rss2');
});

it('permanently redirects /egyesuletek/ to the version without a trailing slash', function () {
    $response = request('/egyesuletek/');

    expect($response['status'])->toBe(301)
        ->and($response['location'])->toBe(url('/egyesuletek'));
});

it('keeps single Club URLs out of the sitemap', function () {
    expect(request('/sitemap_index.xml')['body'])->not->toContain('club-sitemap.xml');
});
