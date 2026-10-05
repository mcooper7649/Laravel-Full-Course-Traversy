#!/bin/sh
# SQLite DB + uploaded logos live in /data so they survive container rebuilds.
set -e
mkdir -p /data/public && touch /data/database.sqlite
chown -R www-data:www-data /data
rm -rf storage/app/public && ln -s /data/public storage/app/public
php artisan storage:link --force >/dev/null 2>&1 || true
php artisan migrate --force
php artisan db:seed --force
php artisan config:cache && php artisan route:cache && php artisan view:cache
chown -R www-data:www-data storage bootstrap/cache
exec apache2-foreground
