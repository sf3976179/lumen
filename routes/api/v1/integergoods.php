<?php
$api->group(['middleware' => 'authToken'],function($api){
    $api->post('integer/goodsadd',['as'=>'integer.goodsadd','uses'=>'IntegerGoodsController@goodsAdd']); //商品增加
    $api->post('integer/specadd',['as'=>'integer.specadd','uses'=>'IntegerGoodsController@goodsspecAdd']); //商品规格增加


    $api->post('integer/specname_add',['as'=>'integer.speckeyadd','uses'=>'IntegerGoodsController@specKeyAdd']); //商品属性名称增加
    $api->get('testaddall/{id}',['as'=>'integer.speckeylist','uses'=>'IntegerGoodsController@testAddAll']); //测试多数据插入时间


    $api->get('specattrlist/{id}',['as'=>'integer.specattrlist','uses'=>'IntegerGoodsController@getSpecAttrList']); //商品属性名称列表



    $api->post('integer/specvalue_add',['as'=>'integer.specvalueadd','uses'=>'IntegerGoodsController@specValueAdd']); //商品属性值增加



});