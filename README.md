# Laravel Learning

Laravel is a PHP web application framework following model-view-controller architectural pattern and based on Symfony. [Visit official website](https://laravel.com/).

## Installation

1. download PHP dependency manager called [composer](https://getcomposer.org/)
2. use laravel installer or composer to create a project

```
composer create-project laravel/laravel example-app

cd example-app

php artisan serve

# or

composer global require laravel/installer

laravel new example-app

cd example-app

php artisan serve
```

## Folder Structure

-   app - holds model and controller which are the base code in the app
-   bootstrap - contains bootstrapping scripts
-   config - holds all configuration files
-   database - store table structure to prepare exporting data to database
-   lang - localization files
-   public - store assets, JS, CSS files
-   resources - store views
-   routes - handle url
-   storage - store session, caches and files that is compiled by blade engine
-   tests - unit test, automated test, etc.
-   vendor - store installed dependencies like node_module in JS
-   artisan - the name of the command-line interface included with Laravel.
-   composer.json - store dependencies data like package.json
-   phpunit.xml - PHPUnit uses XML file for configuration. This file help about testing in Laravel.
-   webpack.mix.js - compiling the CSS file for the application as well as bundling up all the JS files

## Route

Show all routes in Laravel project with `php artisan route:list`. You can config routes in routes/web.php file.

```php
// web.php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    echo "<h1>My Name is Chitsanupong</h1>";
});
```

### Dynamic Route

Send parameter into routes name

```php
Route::get('/users/{id}/{name}', function ($id, $name) {
    echo "Id: ".$id." Name: ".$name;
});
```

## Create view

Create a new view by creating file `<name>.blade.php`. Use dot to refer to that file in case you would like to create the file inside folder.

```php
Route::get('/admin', function () {
    return view('admin.index');
});
```
