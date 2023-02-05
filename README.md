# Spitogatos_Assignment

A laravel application, which uses laravel/passport (for authentication and authorization).

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center" dir="auto"><a href="https://github.com/laravel/passport" target="_blank"><img src="https://raw.githubusercontent.com/laravel/passport/10.x/art/logo.svg" width="400" alt="Laravel Passport Logo"></a></p>

<p align="center" dir="auto">
<a href="https://github.com/laravel/passport/actions"><img src="https://github.com/laravel/passport/workflows/tests/badge.svg" alt="Build Status" style="max-width: 100%;"></a>
<a href="https://packagist.org/packages/laravel/passport" rel="nofollow"><img src="https://camo.githubusercontent.com/811b5d95b9d74c37f103c1c888bfac306af970274b0d4db300e4a04d05fc5725/68747470733a2f2f696d672e736869656c64732e696f2f7061636b61676973742f64742f6c61726176656c2f70617373706f7274" alt="Total Downloads" data-canonical-src="https://img.shields.io/packagist/dt/laravel/passport" style="max-width: 100%;"></a>
<a href="https://packagist.org/packages/laravel/passport" rel="nofollow"><img src="https://camo.githubusercontent.com/945e0ba687acfe07359a8eb64083d6a0505b2b0f91c4c1daeca4a8340dbdeb0f/68747470733a2f2f696d672e736869656c64732e696f2f7061636b61676973742f762f6c61726176656c2f70617373706f7274" alt="Latest Stable Version" data-canonical-src="https://img.shields.io/packagist/v/laravel/passport" style="max-width: 100%;"></a>
<a href="https://packagist.org/packages/laravel/passport" rel="nofollow"><img src="https://camo.githubusercontent.com/49fe5035c7c2a8342d6c2532d546b85a468f2f28f74a907453f1fcdfa5858696/68747470733a2f2f696d672e736869656c64732e696f2f7061636b61676973742f6c2f6c61726176656c2f70617373706f7274" alt="License" data-canonical-src="https://img.shields.io/packagist/l/laravel/passport" style="max-width: 100%;"></a>
</p>

## Installation
### Download Project
Inside the folder of your choice, type:
```
git clone https://github.com/stranger997/dxenos_assignment_sptgt.git
```
### Create Database
This project is using MySQL database schema. <br>
Make sure that you have the MySQL installed. <br>
Create a database using MySQL dbms, choose a name of your choice (ex. exampledb)
### Environment File
Inside the root directory of the project, there is a file named .env.example. <br>
Rename it to .env <br>
It contains these values, that must be set according to the previously created database:<br>
```
...
DB_DATABASE=exampledb
DB_USERNAME=root
DB_PASSWORD=
...
```
### Install Dependencies
Make sure that you have installed the [composer](https://getcomposer.org/).
To install project required dependencies type the following command:
```
composer install
```
Now the vendor folder has been created.
The project has been installed.
### Database Migration
Once you finish with the database connection, is time to add the tables and some data in our database
To do this type:
```
php artisan migrate --seed
```
### Install laravel/passport using uuids
```
php artisan passport:install --uuids
```
In the prompt, you will be asked:
"In order to finish configuring client UUIDs, we need to rebuild the Passport database tables. Would you like to rollback and re-run your last migration? (yes/no) [no]:"
<br>It is safe to choose 'no'.
### At this point, a new encryption key might be necessary.
```
php artisan key:generate
```
## Run Server
In order to start a laravel server run the following command
```
php artisan serve
```
