
## Mailer Lite Test
## Setup
After you clone or download this project, do the following:

```bash
# go into the project
cd mailer_test

# create a .env file
cp .env.example .env

# install composer dependencies
composer update

# install npm dependencies
npm install

# generate a key for your application
php artisan key:generate

# create a local MySQL database (make sure you have MySQL up and running)
mysql -u root

> create database mailer_test;
> exit;

# add the database connection config to your .env file
DB_CONNECTION=mysql
DB_DATABASE=mailer_test
DB_USERNAME=root
DB_PASSWORD=

# run the migration files to generate the database schema
php artisan migrate

# seed your database with some fields and subscribers
php artisan db:seed

# run webpack and watch for changes
npm run watch
```
