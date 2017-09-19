<?php
$api->group(['middleware' => 'authToken'],function($api){
    $api->post('integer/goodslistadd',['as'=>'integer.goodsclassadd','uses'=>'IntegerCenterController@integerGoodsclassAdd']);
});