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

## Blade Template

Blade Template is a library that help processing view to show on web browser together with HTML. It enable view to insert php code and other logic inside HTML file. Blade Template has its own syntax below:

```php
...
<body class="antialiased">
    <?php
    $user = "Chitsanupong";
    $fruits = ['Apple', 'Banana', 'Orange'];

    ?>
    <div class="flex flex-col justify-center items-center">
        <h2>About Me</h2>
        <div class="w-20">
            @if($user == "Chitsanupong")
            <p>Hello {{$user}}</p>
            @else
            <p>Hello Laravel</p>
            @endif

            @foreach($fruits as $fruit)
            <p>{{$fruit}}</p>
            @endforeach
        </div>
    </div>
</body>

```

## Controller

The central component of the architectural pattern which manage the data and logic of the application.

```
# create a new controller
php artisan make:controller MemberController
```

```php
// AboutController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index()
    {
        return view('about');
    }
}

```

```php
// web.php
Route::get('/about', [AboutController::class, 'index']);

```

## Url & Link

Use url variable instead of string. It helps handling routes easier.

```php
// web.php
// define new name to easily refer to the long route
Route::get('/about/chitsanupong', [AboutController::class, 'index'])->name('about');

```

```php
<a href="{{url('/')}}">Home</a>
<a href="{{route('about')}}">About</a> // go to /about/chitsanupong

```

## Send data from controller to view

### Send with Associated Array (Key-value pair array)

```php
// about.blade.php
<section>
    <p>Name: {{$name}}</p>
    <p>Age: {{$age}}</p>
    <p>Position: {{$position}}</p>
</section>
```

```php
// AboutController.php
    function index()
    {
        $name = 'Chitsanupong';
        $age = 21;
        $position = 'front-end developer';
        return view('about', ['name' => $name, 'age' => $age, 'position' => $position]);
    }
```

### Send with compact()

```php
// AboutController.php
    function index()
    {
        $name = 'Chitsanupong';
        $age = 21;
        $position = 'front-end developer';
        return view('about', compact('name','age','position'));
    }
```

### Send with with()

```php

return view('about')->with('name', $name)->with('age', $age)->with('position', $position);
```

## Middleware

Step 1: create middleware with this scaffold below.

```
php artisan make:middleware AuthAdmin
```

Step 2: write middleware code in handle function.

```php
// AuthAdmin.php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user == 'chitsanupong') {
            return redirect(route('admin'));
        }

        // pass every request
        return $next($request);
    }
}

```

Step 3: register the middleware in Kernel.php

```php
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // write the new middleware here
        'auth' => \App\Http\Middleware\AuthAdmin::class,
    ];
```
