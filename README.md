# Product CRUD Project

This is a simple project

## Installation

- git clone `https://github.com/Yunandarmoe/product-crud.git`

- Open project folder

- Copy .env file

- Create database same with .env database name

- php artisan migrate

## Finally run

- php artisan serve

## Unit Testing

- Open two comment of phpunit.xml and replace the database testing name in value

- Change the database name with the testing database

- php artisan config:cache if migration is not working

- php artisan migrate

- Finally, test in the command line
``` php artisan test --filter ClassName```
