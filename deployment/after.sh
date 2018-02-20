#!/bin/sh
php artisan migrate
npm run production
php artisan route:cache
php artisan config:cache
