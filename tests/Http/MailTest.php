<?php

function mailpitApi(string $method, string $path): array
{
    $curl = curl_init(rtrim(getenv('TEST_MAILPIT_URL'), '/') . $path);
    curl_setopt_array($curl, [CURLOPT_RETURNTRANSFER => true, CURLOPT_CUSTOMREQUEST => $method]);

    return json_decode(curl_exec($curl) ?: '[]', true) ?? [];
}

it('delivers mail sent by WordPress to Mailpit', function () {
    mailpitApi('DELETE', '/api/v1/messages');

    request('/wp/wp-login.php?action=lostpassword', 'POST', ['user_login' => 'tesztelo']);

    $messages = mailpitApi('GET', '/api/v1/search?query=' . urlencode('to:tesztelo@viktoriakupa.test'));

    expect($messages['messages_count'] ?? 0)->toBe(1);
});
