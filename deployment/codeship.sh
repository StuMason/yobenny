#!/bin/sh
phpenv local 7.1
mkdir -p ./bootstrap/cache
composer install --no-interaction
curl -sSL https://raw.githubusercontent.com/codeship/scripts/master/packages/mysql-5.7.sh | bash -s
mysql -e 'create database forge;'
mysql -e 'CREATE USER forge@localhost IDENTIFIED BY secret;'
mysql -e 'GRANT ALL PRIVILEGES ON * . * TO forge@localhost;'
php artisan migrate:fresh --seed