<?php

namespace ViktoriaKupa;

add_action('template_redirect', function (): void {
    $path = rtrim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');

    if ($path === '/studio' || str_starts_with($path, '/studio/')) {
        wp_safe_redirect(admin_url(), 301);
        exit;
    }
}, 1);
