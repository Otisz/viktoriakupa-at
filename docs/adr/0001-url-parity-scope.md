# URL parity covers page paths and the domain only

The migration from Laravel + Filament to Bedrock WordPress keeps the domain (viktoriakupa.hu) and every public page path byte-identical, including the no-trailing-slash form (`/hirek/{slug}`, `/dokumentumok/{slug}`, `/rolunk`, …). Everything else follows default WordPress behaviour, so we don't carry custom rewrite code for low-value legacy URLs.

## Consequences

- Uploaded files move from `/storage/...` to `/app/uploads/...`; old file links (including those inside migrated Post content) break unless fixed during the manual data migration.
- News pagination moves from `/hirek?page=N` to `/hirek/page/N`; old `?page=N` links show the first page.
- The admin moves from `/studio` to `/wp/wp-admin`; `/studio` and `/studio/*` redirect there.
- `/dokumentumok` keeps its existing 302 redirect to `/`.
