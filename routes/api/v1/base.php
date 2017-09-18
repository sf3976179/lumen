<?php

// api路由实例
$api = app('Dingo\Api\Routing\Router');

// 定义一个版本分组
$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\V1'], function ($api) {

  $api->group(['middleware' => 'test'], function ($api) {
      // 创建端点，命名路由
      $api->get('test', ['as' => 'test.show', 'uses' => 'TestController@show']);
      $api->get('test1/{id}', ['as' => 'test.show1','uses' => 'TestController@show1']);
      $api->post('test2', ['as' => 'test1.test1','uses' => 'Test1Controller@test1']);
      $api->get('test2', ['as' => 'test1.test1','uses' => 'Test1Controller@test1']);
      $api->put('test3/{id}', [
        'as' => 'test.test3',
        'uses' => 'TestController@test3'
      ]);
  });

  // 正式接口
  $api->get('/',function($api){
    return $api->version();
  });
  // 登录注册
  $api->post('user/login',['as'=>'login','uses'=>'MemberController@login']);
  $api->post('user/register',['as'=>'register','uses'=>'MemberController@register']);

//    $api->get('/redis', function () use ($api) {
//             //return $app->version();
//     Cache::put('lumen', 'Hello, Lumen.', 5);
//     return Cache::get('lumen');
//    });

    require_once __DIR__ . '/member.php'; //会员
    require_once __DIR__ . '/article.php'; //文章
    require_once __DIR__ . '/articlecomment.php'; //文章内容


});
