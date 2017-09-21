<?php
$api->group(['middleware' => 'authToken'],function($api){
    $api->post('integer/goodsadd',['as'=>'integer.goodsadd','uses'=>'IntegerGoodsController@goodsAdd']);
});