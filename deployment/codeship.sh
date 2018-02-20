#!/bin/sh
phpenv local 7.1
mkdir -p ./bootstrap/cache
composer install --no-interaction
mysql -e 'create database test;'
mysql -e 'CREATE USER test@localhost IDENTIFIED BY secret;'
mysql -e 'GRANT ALL PRIVILEGES ON * . * TO test@localhost;'
php artisan migrate:fresh --seed
./vendor/laravel/dusk/bin/chromedriver-linux &
cp .env.codeship .env
php artisan serve > /dev/null 2>&1 &
sleep 3