<?php

namespace App\Models;

class Article extends BaseModel
{
    protected $table = 'article';
    //可被批量赋值的字段
    protected $fillable = [
        'ac_name','ac_parent_id','ac_subtitle','member_id'
    ];

    // 取消自动维护
    public $timestamps = false;


}