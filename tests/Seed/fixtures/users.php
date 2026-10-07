<?php

$login = 'tesztelo';
$email = 'tesztelo@viktoriakupa.test';

$user = get_user_by('login', $login);

if (! $user) {
    wp_insert_user([
        'user_login' => $login,
        'user_email' => $email,
        'user_pass' => wp_generate_password(),
        'role' => 'subscriber',
    ]);
} elseif ($user->user_email !== $email) {
    wp_update_user(['ID' => $user->ID, 'user_email' => $email]);
}
