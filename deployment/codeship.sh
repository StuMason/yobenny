#!/bin/sh
phpenv local 7.1
mkdir -p ./bootstrap/cache
cp .env.codeship .env
curl -sSL https://raw.githubusercontent.com/codeship/scripts/master/packages/mysql-5.7.sh | bash -s
mysql -e "CREATE USER 'mr_test'@'localhost' IDENTIFIED BY 'password';"
mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'mr_test'@'%';"
composer install --no-interaction
nvm install 6
yarn install
npm run development
php artisan migrate:fresh --seed
nohup bash -c "./vendor/laravel/dusk/bin/chromedriver-linux 2>&1 &"
nohup bash -c "php artisan serve 2>&1 &" && sleep 3





