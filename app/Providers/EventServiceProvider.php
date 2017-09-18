<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     * 注册事件监听器
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\TestEvent' => [
    	     'App\Listeners\TestListener'
         ],
         'App\Events\PostSaved'=>[
           'App\Listeners\SaveDataToCache'
         ],
         // 我就不信这TM还不成功（注册事件/监听器）
         'App\Events\Test1'=>[
           'App\Listeners\Test1Listener'
         ],
         //添加事件监听者  
         'App\Events\SkulogEvent' => [
           'App\Listeners\SkulogListener',
         ],
    ];
}
