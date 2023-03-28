FROM php:8.2-fpm-alpine

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html/

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

COPY . .

RUN composer install

CMD php artisan migrate:refresh;echo "[1/2] Migration DONE"; php artisan db:seed --class=HotelSeeder;echo "[2/2] Seedging DONE"; php -S lumen:8000 -t public;

