<?php

namespace App\Models;

class IntegerGoods extends BaseModel
{
    protected $table = 'integer_goods';
    //可被批量赋值的字段
//    protected $fillable = [
//        'goods_name'
//    ];

    // 取消自动维护
    public $timestamps = false;


}