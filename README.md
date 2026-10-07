# Viktória Kupa

Bedrock WordPress site for viktoriakupa.hu. See `CONTEXT.md` for the domain glossary and `docs/adr/` for decisions.

## Local development

Requires Docker. Every command runs inside the `php` container, so PHP, Composer and WP-CLI (WordPress Command Line Interface) don't need to be installed locally.

### Start the stack

```sh
cp .env.example .env
docker compose up -d
```

- Site: http://localhost:8080
- Admin: http://localhost:8080/wp/wp-admin (credentials from `WP_ADMIN_*` in `.env`)
- Mailpit: http://localhost:8025

Change `APP_PORT` or `MAILPIT_PORT` in `.env` if those ports are taken, and update `WP_HOME` to match.

### Install WordPress

```sh
docker compose exec php composer install
docker compose exec php bin/install-site
```

`bin/install-site` is idempotent: it installs WordPress if needed and applies the Hungarian locale, Europe/Budapest timezone, plugins, theme, permalinks and Yoast title templates.

### Seed test content

```sh
docker compose exec php composer seed
```

This idempotently creates the fixtures in `tests/Seed/fixtures`: Pages, Posts, Clubs, Documents, menus, site settings and the Yoast default social image.

### Run the tests

```sh
docker compose exec php composer test
```

This runs the seed and then the Pest HTTP (Hypertext Transfer Protocol) suite (`tests/Http`), which sends real requests to nginx. `tests/Http/UrlParityTest.php` checks the legacy Laravel route table against ADR-0001 (Architecture Decision Record).

```sh
docker compose exec php composer lint
```

## Production

After installing, upload a default social sharing image under Yoast SEO (Search Engine Optimization) › Settings › Site basics. Yoast uses it as `og:image` on pages without their own image.
