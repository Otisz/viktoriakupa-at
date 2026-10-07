<?php

namespace ViktoriaKupa;

add_action('template_redirect', function (): void {
    $path = rtrim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');

    if ($path === '/studio' || str_starts_with($path, '/studio/')) {
        wp_safe_redirect(admin_url(), 301);
        exit;
    }

    if ($path === '/dokumentumok') {
        wp_safe_redirect(home_url('/'), 302);
        exit;
    }
}, 1);

// Core drops a non-default port (like local :8080) from paginated canonical URLs, which cancels their trailing-slash redirect
add_filter('redirect_canonical', function (mixed $url): mixed {
    $home = wp_parse_url(home_url());
    $target = is_string($url) ? wp_parse_url($url) : false;

    if (! $target || empty($home['port']) || isset($target['port']) || ($target['host'] ?? null) !== $home['host']) {
        return $url;
    }

    return preg_replace('#^(\w+://[^/?\#]+)#', '$1:' . $home['port'], $url, 1);
});
