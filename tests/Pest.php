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
        CURLOPT_CONNECT_TO => array_filter([getenv('TEST_CONNECT_TO') ? '::' . getenv('TEST_CONNECT_TO') : null]),
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
