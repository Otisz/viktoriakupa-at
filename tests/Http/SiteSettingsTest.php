<?php

it('shows the contact details from the site settings', function (string $path) {
    $body = request($path)['body'];

    expect($body)->toContain('<a href="https://www.facebook.com/viktoriakupa.teszt">Facebook</a>')
        ->and($body)->toContain('<a href="tel:+36301234567">+36 30 123 4567</a>')
        ->and($body)->toContain('<a href="mailto:info@viktoriakupa.test">info@viktoriakupa.test</a>');
})->with([
    '/',
    '/kapcsolat',
]);

it('links the Temporary and Permanent Application forms from the site settings', function (string $path) {
    $body = request($path)['body'];

    expect($body)->toContain('<a href="https://forms.example.com/ideiglenes">Ideiglenes jelentkezés</a>')
        ->and($body)->toContain('<a href="https://forms.example.com/allando">Állandó jelentkezés</a>');
})->with([
    '/',
    '/kapcsolat',
]);
