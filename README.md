# Product CRUD Project

- PHP ^7.4
- Laravel ^8

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

- Change database name of **.env** file with the testing database

- php artisan config:cache if migration is not working

- php artisan migrate

- Finally, test in the command line
``` php artisan test --filter ClassName```

## Evidence

### Product List
![image](https://user-images.githubusercontent.com/101326055/187028812-b9971375-767e-4a1f-a309-285dfbc6ca47.png)

### Product Create, Update, Delete Test
![image](https://user-images.githubusercontent.com/101326055/187028902-7bc0be61-7718-4523-b6d4-59542d80bb9d.png), ![image](https://user-images.githubusercontent.com/101326055/187028970-7d26e3e6-bda4-429a-9426-8bb7a58db5c1.png), ![image](https://user-images.githubusercontent.com/101326055/187028995-2bb0628a-8a90-4255-bf96-228b03612a02.png)

## Test Case Sheet
- [Test Case Sheet](https://docs.google.com/spreadsheets/d/1SxUcuqBDEAVAg_7itjod2ibbQYYu9Sg1dBegB5Gt94M/edit#gid=0)






