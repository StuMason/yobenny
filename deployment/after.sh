#!/bin/sh
php artisan migrate
php artisan route:cache
php artisan config:cache
