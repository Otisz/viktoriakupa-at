<?php

namespace ViktoriaKupa;

const SETTINGS_OPTION = 'viktoriakupa_settings';

const SETTINGS_FIELDS = [
    'temporary_application_url' => ['label' => 'Ideiglenes jelentkezés űrlap URL', 'type' => 'url'],
    'permanent_application_url' => ['label' => 'Állandó jelentkezés űrlap URL', 'type' => 'url'],
    'facebook_url' => ['label' => 'Facebook URL', 'type' => 'url'],
    'phone' => ['label' => 'Telefonszám', 'type' => 'tel'],
    'email' => ['label' => 'E-mail cím', 'type' => 'email'],
];

/**
 * @param key-of<SETTINGS_FIELDS> $key
 */
function setting(string $key): string
{
    $settings = get_option(SETTINGS_OPTION);

    return is_array($settings) ? (string) ($settings[$key] ?? '') : '';
}

/**
 * Keeps the previously saved value of any field that fails validation.
 */
function sanitizeSettings(mixed $input): array
{
    $input = is_array($input) ? $input : [];
    $settings = [];

    foreach (SETTINGS_FIELDS as $key => $field) {
        $value = trim((string) ($input[$key] ?? ''));

        $valid = match ($field['type']) {
            'url' => filter_var($value, FILTER_VALIDATE_URL) && in_array(wp_parse_url($value, PHP_URL_SCHEME), ['http', 'https'], true),
            'email' => (bool) is_email($value),
            'tel' => true,
        };

        if ($value === '' || $valid) {
            $settings[$key] = match ($field['type']) {
                'url' => sanitize_url($value),
                'email' => sanitize_email($value),
                'tel' => sanitize_text_field($value),
            };
        } else {
            $settings[$key] = setting($key);
            add_settings_error(SETTINGS_OPTION, $key, "Érvénytelen érték: {$field['label']}");
        }
    }

    return $settings;
}

add_action('admin_init', function (): void {
    register_setting(SETTINGS_OPTION, SETTINGS_OPTION, [
        'type' => 'object',
        'default' => [],
        'sanitize_callback' => __NAMESPACE__ . '\sanitizeSettings',
    ]);

    add_settings_section('default', '', '__return_null', SETTINGS_OPTION);

    foreach (SETTINGS_FIELDS as $key => $field) {
        add_settings_field($key, $field['label'], function () use ($key, $field): void {
            printf(
                '<input type="%s" id="%s" name="%s[%s]" value="%s" class="regular-text">',
                esc_attr($field['type']),
                esc_attr($key),
                esc_attr(SETTINGS_OPTION),
                esc_attr($key),
                esc_attr(setting($key)),
            );
        }, SETTINGS_OPTION, 'default', ['label_for' => $key]);
    }
});

add_action('admin_menu', function (): void {
    add_options_page('Viktória Kupa', 'Viktória Kupa', 'manage_options', SETTINGS_OPTION, function (): void {
        ?>
        <div class="wrap">
            <h1>Viktória Kupa</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields(SETTINGS_OPTION);
        do_settings_sections(SETTINGS_OPTION);
        submit_button();
        ?>
            </form>
        </div>
        <?php
    });
});
