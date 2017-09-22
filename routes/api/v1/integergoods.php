<?php
$api->group(['middleware' => 'authToken'],function($api){
    $api->post('integer/goodsadd',['as'=>'integer.goodsadd','uses'=>'IntegerGoodsController@goodsAdd']); //商品增加
    $api->post('integer/specadd',['as'=>'integer.specadd','uses'=>'IntegerGoodsController@goodsspecAdd']); //商品规格增加


});