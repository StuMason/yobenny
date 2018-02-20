#!/bin/sh
phpenv local 7.1
mkdir -p ./bootstrap/cache
cp .env.codeship .env
composer install --no-interaction --no-scripts
mysql -e 'create database testing;'
mysql -e 'CREATE USER testing@localhost IDENTIFIED BY secret;'
mysql -e 'GRANT ALL PRIVILEGES ON * . * TO test@localhost;'
php artisan migrate:fresh --seed
./vendor/laravel/dusk/bin/chromedriver-linux &
php artisan serve > /dev/null 2>&1 &
sleep 3