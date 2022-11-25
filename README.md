# Land Register App

Simple land register CRUD project for information storage built on Laravel 9.

## Requirements

1. PHP 8
2. Composer
3. MySQL database
    
## Installation

1. Clone git repository
2. Run command:    
~~~
composer install
~~~
3. Create new MySQL database schema
4. Rename .env.example file to .env and fill following rows with your database data:
~~~
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
~~~
5. Run command:
~~~
php artisan key:generate
~~~
6. Run command to create database tables:
~~~
php artisan migrate
~~~
7. Run command to add fake records to database:
~~~
php artisan db:seed
~~~
8. Run host:
~~~
php artisan serve
~~~
