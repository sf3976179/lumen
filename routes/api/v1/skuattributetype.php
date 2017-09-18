<?php

    //*******************************供货商模块**********************************************
    $api->resource('skuattributetypes','SkuattributetypeController',['except'=>['create','edit']]);
    $api->get('skuattributetypes/{id}/skuattributegroups','SkuattributetypeController@skuattributegroups');
