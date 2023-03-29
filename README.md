# There are two options to run this application

## Option 1 - Docker

### 1.1 - Copy env.example to .env file
### 1.2 - Run this command bellow
    > docker-compose up --build


## Option 2 - Create your own local enviroment (PHP 8.2, Composer 2.5)

### 2.1 - Run these commands
    
    > php artisan migrate;
    > php artisan db:seed --class=HotelSeeder;
    > php -S localhost:8000 -t public;
