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
        'user_id','parent_id','article_id','comment','type','star'
    ];

    // 取消自动维护
    public $timestamps = false;


}