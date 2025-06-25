FROM composer:2 AS composer
COPY . /var/www/html
WORKDIR /var/www/html
RUN composer install

FROM php:8.3-fpm AS base
RUN apt-get update
RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pdo_pgsql

FROM base AS prod
COPY --from=composer /var/www/html /var/www/html
