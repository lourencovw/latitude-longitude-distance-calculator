# There are two options to run this application

## Option 1 - Docker

### 1.1 - Copy env.example to .env file
### 1.2 - Run this command bellow
    > docker-compose up --build


## Option 2 - Create your own local enviroment (PHP 8.2, Composer 2.5)

### 2.1 - Copy env.example to .env file

### 2.2 - Run these commands

    > composer install;    
    > php artisan migrate;
    > php artisan db:seed --class=HotelSeeder;
    > php -S localhost:8000 -t public;

# Testing

## You can see the results acessing this URL

> localhost:8000?latitude=35.6534&longitude=139.74477&order-by=pricepernight
