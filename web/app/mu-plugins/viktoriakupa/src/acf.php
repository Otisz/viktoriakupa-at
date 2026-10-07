<?php

namespace ViktoriaKupa;

add_filter('acf/settings/save_json', fn(): string => dirname(__DIR__) . '/acf-json');
add_filter('acf/settings/load_json', fn(): array => [dirname(__DIR__) . '/acf-json']);
