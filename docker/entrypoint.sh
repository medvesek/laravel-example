#!/bin/bash
php artisan optimize
php-fpm -D
nginx -g 'daemon off;'
