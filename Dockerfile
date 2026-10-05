FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --ignore-platform-reqs
COPY . .
RUN composer dump-autoload --optimize --no-dev

FROM php:8.3-apache
RUN a2enmod rewrite && sed -i 's#/var/www/html#/var/www/html/public#' /etc/apache2/sites-available/000-default.conf \
 && printf '<Directory /var/www/html/public>\n  AllowOverride All\n</Directory>\n' > /etc/apache2/conf-enabled/laravel.conf
WORKDIR /var/www/html
COPY --from=vendor /app ./
COPY docker-entrypoint.sh /usr/local/bin/laragigs-entrypoint
RUN chmod +x /usr/local/bin/laragigs-entrypoint && chown -R www-data:www-data storage bootstrap/cache
CMD ["laragigs-entrypoint"]
