<?php

namespace App\Providers;

use App\User;
use App\Models\Users;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;   //引入默认redis缓存
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.
        $this->app['auth']->viaRequest('api', function ($request) {
            // 接收发送的apitoken  
            if ($request->header('token')) {
                $data = Users::where('api_token', $request->header('token'))->first();
                Cache::put('member_id',$data['member_id'],60);
                return $data;
            }
        });
    }
}
