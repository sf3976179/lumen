<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/9/19
 * Time: 15:50
 */
namespace App\Models;

class IntegerGoodsClass extends BaseModel
{
    protected $table = 'integer_goodsclass';
    //可被批量赋值的字段
    protected $fillable = [
        'category_name','category_describe','parent_id','category_img','level'
    ];

    // 取消自动维护
    public $timestamps = false;


}