<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}
// service providers

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/../')
);

// 使用Log facade
$app->withFacades();

// Eloquent ORM
$app->withEloquent();

//加载对应config文件（启用配置文件）
$app->configure('upload');


/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

// 发送http请求自动访问中间件
$app->middleware([
  //  App\Http\Middleware\ExampleMiddleware::class
  App\Http\Middleware\TestMiddleware::class,
//  App\Http\Middleware\AuthTokenMiddleware::class
]);

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
    'test' => App\Http\Middleware\TestMiddleware::class,
    'authToken' => App\Http\Middleware\AuthTokenMiddleware::class
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

//开启注册提供者
$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);
$app->register(Illuminate\Redis\RedisServiceProvider::class);   //开启redis
// 注册dingo/api 服务 service providers
// 这个包提供了俩个facades
$app->register(Dingo\Api\Provider\LumenServiceProvider::class);

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

// 完全控制 Monolog
// 实现每天一份日志
$app->configureMonologUsing(function (Monolog\Logger $monolog) use ($app) {
    return $monolog->pushHandler(
        new \Monolog\Handler\RotatingFileHandler($app->storagePath().'/logs/lumen.log')
        // new \Monolog\Processor\MemoryUsageProcessor($app->storagePath().'/logs/lumen.log')
    );
});

$app->group(['namespace' => 'App\Http\Controllers'], function ($app) {
    require_once __DIR__.'/../routes/api/v1/base.php';  //引入定义的路由
    require __DIR__.'/../routes/web.php';
});

return $app;
