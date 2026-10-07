<?php

it('lists the 15 newest Posts in date order at /hirek', function () {
    $response = request('/hirek');

    expect($response['status'])->toBe(200)
        ->and(listedPostTitles($response['body']))->toBe([
            'Teszt hír 16', 'Teszt hír 15', 'Teszt hír 14', 'Teszt hír 13', 'Teszt hír 12',
            'Teszt hír 11', 'Teszt hír 10', 'Teszt hír 09', 'Teszt hír 08', 'Teszt hír 07',
            'Teszt hír 06', 'Teszt hír 05', 'Teszt hír 04', 'Teszt hír 03', 'Teszt hír 02',
        ]);
});

it('lists the remaining Posts on the second page', function () {
    $response = request('/hirek/page/2');

    expect($response['status'])->toBe(200)
        ->and(listedPostTitles($response['body']))->toBe(['Teszt hír 01']);
});
