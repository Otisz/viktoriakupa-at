<?php

it('renders the front Page content at the root', function () {
    $response = request('/');

    expect($response['status'])->toBe(200)
        ->and($response['body'])->toContain('Üdvözöljük a Viktória Kupa oldalán!')
        ->and($response['body'])->toContain('Támogatóink');
});
