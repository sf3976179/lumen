<?php
/**
 * Created by SF
 * User: SF
 * Date: 2017/9/14
 * Time: 17:14
 */

namespace App\Models;

class Article_content extends BaseModel
{
    protected $table = 'article_content';
    //可被批量赋值的字段
    protected $fillable = [
        'user_id','ac_id','main_title','subtitle','ac_tag','image_name','movie_name','ac_display','content','add_time','update_time'
    ];

    // 取消自动维护
    public $timestamps = false;


}