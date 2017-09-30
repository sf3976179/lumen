<?php
/**
 * Created by PhpStorm.
 * User: Rhythm
 * Date: 2017/9/27
 * Time: 15:32
 */
namespace App\Models;

class IntegerGoodsSpecKey extends BaseModel
{
    protected $table = 'integer_goods_spec_key';
    //可被批量赋值的字段
    protected $fillable = [
        'id','goods_id','attr_name'
    ];


    // 取消自动维护
    public $timestamps = false;


}