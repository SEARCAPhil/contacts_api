# contacts_api
SEARCA's contacts database

## Installation
* Clone rpository to your machine

* Install dependencies
  > composer install

* Copy `.env.example` to `.env` and change it with your database credentials

* Generate laravel key
  > php artisan key:generate

* Create database tables using Laravel's migration command
  > php artisan migrate:fresh

  or `create database and populate sample data` using `--seed` command
  > php artisan migrate:fresh --seed

  
  ***Note: Migration commands will erase all the data in your database.Please make sure that you will only run this on your `development machine`***

