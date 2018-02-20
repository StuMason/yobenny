#!/bin/sh
phpenv local 7.1
nvm install 6
mkdir -p ./bootstrap/cache
cp .env.codeship .env
mysql -e "CREATE USER 'mr_test'@'%' IDENTIFIED BY 'password';"
mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'mr_test'@'%';"
composer install --no-interaction --no-scripts
yarn install
npm run development
php artisan migrate:fresh --seed
./vendor/laravel/dusk/bin/chromedriver-linux &
php artisan serve > /dev/null 2>&1 &
sleep 3