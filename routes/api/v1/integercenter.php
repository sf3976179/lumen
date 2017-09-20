<?php
$api->group(['middleware' => 'authToken'],function($api){
    // 积分商品分类增加
    $api->post('integer/goodslistadd',['as'=>'integer.goodsclassadd','uses'=>'IntegerCenterController@integerGoodsclassAdd']);
    $api->get('integergoodslist/{id}',['as'=>'integer.goodslist','uses'=>'IntegerCenterController@integerGoodsList']); // 积分商品分类列表
});