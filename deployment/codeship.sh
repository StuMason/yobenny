#!/bin/sh
phpenv local 7.1
mkdir -p ./bootstrap/cache
cp .env.codeship .env
touch database/database.sqlite
composer install --no-interaction --no-scripts
npm install
npm run prod
php artisan migrate:fresh --seed
nohup bash -c "./vendor/laravel/dusk/bin/chromedriver-linux 2>&1 &"
nohup bash -c "php artisan serve 2>&1 &" && sleep 3





