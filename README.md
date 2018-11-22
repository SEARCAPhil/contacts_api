# contacts_api
SEARCA's contacts database   

![CI](https://travis-ci.org/SEARCAPhil/contacts_api.svg?branch=develop)

## Installation
___
* Clone repository to your machine

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


## Docker
___
This will ensure that all developers are using the same environment during the development phase. This is not required, but comes in handy if your machine contains different php version.

* After you cloned the repository, make sure to change your current working directory.
  > cd contacts_api

* Build the image

  > docker build -t phpapp .

* Create a container running php/apache in port `81`.
  > docker run --rm -v **[/to/your/absolute/path]**:/var/www/html -p 81:80 phpapp
     
  Example command in MacOS :   
  > `docker run --rm -v /Applications/XAMPP/htdocs/contacts_api:/var/www/html -p 81:80 phpapp `  
  
  **[/to/your/absolute/path]** - replace it with the directory of the Contacts API   
  **/var/www/html** - Default apache file storage(must not change this one)

* Open your browser and enter `http://localhost:81/public/`
* If you see the default Laravel home page, it means you have successfully spin a docker container running a `php/apache` server.

   
> NOTES: Docker only allows few folders that could be mount into the volume or else you will receive a permission denied error and you might need to copy the whole directory for this to properly work.    
If you are using `XAMPP` in MacOS, please go to `Docker > preferences > File Sharing` and add new entry `/Applications/XAMPP/xampp/htdocs`.  
