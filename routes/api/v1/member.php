<?php
$api->group(['middleware' => 'authToken'],function($api){
    $api->get('user/list', ['as' => 'user.list', 'uses' => 'MemberController@usersList']); //用户列表
    $api->get('user/info', ['as' => 'user.info', 'uses' => 'MemberController@memberInfo']); //会员信息
});
