FROM php:8.4-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip less mariadb-client libzip-dev libicu-dev libpng-dev libjpeg62-turbo-dev libwebp-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j"$(nproc)" mysqli pdo_mysql gd intl zip exif opcache \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

RUN curl -fsSL -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x /usr/local/bin/wp

COPY php.ini /usr/local/etc/php/conf.d/zz-app.ini

ENV WP_CLI_ALLOW_ROOT=1 \
    COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www/html
