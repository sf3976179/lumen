<?php
/**
 * Created by PhpStorm.
 * User: Rhythm
 * Date: 2017/9/15
 * Time: 17:32
 */
namespace App\Models;

class ArticleComment extends BaseModel
{
    protected $table = 'article_comment';
    //可被批量赋值的字段
    protected $fillable = [
        'user_id','ac_id','main_title','subtitle','ac_tag','image_name','movie_name','ac_display','content','add_time','update_time'
    ];

    // 取消自动维护
    public $timestamps = false;


}