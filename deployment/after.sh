#!/bin/sh
php artisan migrate
yarn install
npm run production
php artisan route:cache
php artisan config:cache
