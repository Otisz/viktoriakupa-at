<?php

/**
 * Idempotent test fixtures, run with `wp eval-file`. Each file in fixtures/
 * must leave the same state no matter how many times it runs.
 */

$fixtures = glob(__DIR__ . '/fixtures/*.php');
sort($fixtures);

foreach ($fixtures as $fixture) {
    require $fixture;
    WP_CLI::log('Seeded ' . basename($fixture, '.php'));
}
