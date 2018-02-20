#!/bin/sh
phpenv local 7.1
mkdir -p ./bootstrap/cache
cp .env.codeship .env
composer install --no-interaction --no-scripts
npm run production
php artisan migrate:fresh --seed
./vendor/laravel/dusk/bin/chromedriver-linux &
php artisan serve > /dev/null 2>&1 &
sleep 3