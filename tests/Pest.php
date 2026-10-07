<?php

/**
 * Sends a real request to the running site without following redirects.
 *
 * @return array{status: int, location: ?string, body: string}
 */
function request(string $path, string $method = 'GET', array $form = []): array
{
    $curl = curl_init(url($path));

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HEADER => true,
        CURLOPT_CONNECT_TO => connectTo(),
    ]);

    if ($form !== []) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($form));
    }

    $response = curl_exec($curl);
    $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);

    preg_match('/^location:\s*(.+)$/mi', $headers, $location);

    return [
        'status' => curl_getinfo($curl, CURLINFO_RESPONSE_CODE),
        'location' => isset($location[1]) ? trim($location[1]) : null,
        'body' => substr($response, $headerSize),
    ];
}

/**
 * Routes test requests to nginx inside Docker Compose while keeping the public host name.
 */
function connectTo(): array
{
    return array_filter([getenv('TEST_CONNECT_TO') ? '::' . getenv('TEST_CONNECT_TO') : null]);
}

function url(string $path): string
{
    return rtrim(getenv('TEST_BASE_URL'), '/') . $path;
}

/**
 * @return list<string>
 */
function listedPostTitles(string $body): array
{
    preg_match_all('/<h2><a href="[^"]*\/hirek\/teszt-hir-\d+">([^<]+)<\/a><\/h2>/', $body, $matches);

    return $matches[1];
}

/**
 * @return array<string, string> the HTML of each listed Club, keyed by name
 */
function listedClubs(string $body): array
{
    preg_match_all('/<article>.*?<h2>(?:<a [^>]*>)?([^<]+).*?<\/article>/s', $body, $matches);

    return array_combine($matches[1], $matches[0]);
}

/**
 * @return array<string, string> the download URL of each listed Document, keyed by title
 */
function listedDocuments(string $body): array
{
    preg_match_all('/<a href="([^"]+)" download>([^<]+)<\/a>/', $body, $matches);

    return array_combine($matches[2], $matches[1]);
}

/**
 * Fetches a wp-admin screen as the admin user from `.env`, posting the form if given.
 */
function adminPage(string $path, array $form = []): string
{
    static $cookieJar = null;

    if ($cookieJar === null) {
        $cookieJar = tempnam(sys_get_temp_dir(), 'wp-admin-cookies');
        $curl = curl_init(url('/wp/wp-login.php'));

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => http_build_query(['log' => getenv('WP_ADMIN_USER'), 'pwd' => getenv('WP_ADMIN_PASSWORD')]),
            CURLOPT_COOKIE => 'wordpress_test_cookie=WP%20Cookie%20check',
            CURLOPT_COOKIEJAR => $cookieJar,
            CURLOPT_CONNECT_TO => connectTo(),
        ]);
        curl_exec($curl);
    }

    $curl = curl_init(url($path));

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_COOKIEFILE => $cookieJar,
        CURLOPT_CONNECT_TO => connectTo(),
    ]);

    if ($form !== []) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($form));
    }

    return curl_exec($curl);
}
