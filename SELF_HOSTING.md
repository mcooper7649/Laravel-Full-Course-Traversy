# Self-hosting

Live at **https://laragigs.mycodedojo.com**, self-hosted on Michael's homelab (moved off Netlify/Vercel in October 2026).

It runs as a container in the `portfolio-projects` Docker Compose stack on the homelab (`~/portfolio-projects`, visible in Portainer), behind Caddy.

**Redeploy after pushing to `main`:**

```bash
ssh mcooper@192.168.68.75 '~/portfolio-projects/deploy.sh laragigs'
```

**Run locally:**

```bash
docker build -t laragigs .
docker run -p 3000:80 laragigs
```

## Configuration

- **Stack:** PHP 8.3 + Apache, SQLite at `/data/database.sqlite` (Docker volume `portfolio_laragigs`). Uploaded logos are in `/data/public`.
- On start the container runs migrations and `db:seed` (fixed demo data, idempotent).
- **Env:** `APP_KEY`, `APP_URL`, `DB_CONNECTION=sqlite`, `DB_DATABASE`.
- **Demo login:** `demo@mycodedojo.com` / `laragigs-demo`.
- `trustProxies('*')` is on so URLs come out as https behind Caddy/Cloudflare. `vercel.json` / `api/` are leftovers from the old Vercel deploy.
