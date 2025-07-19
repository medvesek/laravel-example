FROM composer:2 AS composer
COPY . /var/www/html
WORKDIR /var/www/html
RUN composer install

FROM php:8.3-fpm AS base
RUN apt-get update
RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pdo_pgsql
RUN apt-get install -y nginx
COPY ./docker/default_nginx.conf /etc/nginx/sites-available/default
CMD sh -c "php-fpm & nginx -g 'daemon off;'"

FROM base AS dev
RUN chmod -R 777 /var/lib/nginx
RUN chmod -R 777 /var/log/nginx
RUN chmod -R 777 /run

FROM base AS prod
WORKDIR /var/www/html
COPY --chown=www-data:www-data --from=composer /var/www/html /var/www/html
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY ./docker/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY ./docker/entrypoint.sh /
RUN chmod +x /entrypoint.sh
CMD ["/entrypoint.sh"]
