#!/bin/sh
vendor/bin/phpunit
php artisan migrate
php artisan route:cache
php artisan config:cache