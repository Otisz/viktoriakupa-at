# Viktória Kupa

Bedrock WordPress site for viktoriakupa.hu. See `CONTEXT.md` for the domain glossary and `docs/adr/` for decisions.

## Local development

Requires Docker.

```sh
cp .env.example .env
docker compose up -d
docker compose exec php composer install
docker compose exec php bin/install-site
```

- Site: http://localhost:8080
- Admin: http://localhost:8080/wp/wp-admin (credentials from `WP_ADMIN_*` in `.env`)
- Mailpit: http://localhost:8025

`bin/install-site` is idempotent: it installs WordPress if needed and applies the Hungarian locale, Europe/Budapest timezone, plugins, theme and permalinks.

## Tests

```sh
docker compose exec php composer test
```

This runs the idempotent seed (`tests/Seed`) and then the Pest HTTP (Hypertext Transfer Protocol) suite (`tests/Http`), which sends real requests to nginx.
