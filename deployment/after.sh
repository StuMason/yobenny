#!/bin/sh
php artisan migrate
yarn install
npm run prod
php artisan route:cache
php artisan config:cache
