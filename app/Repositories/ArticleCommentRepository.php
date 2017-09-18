<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/9/15
 * Time: 17:21
 */

namespace App\Repositories;

use App\Models\ArticleComment;

class ArticleCommentRepository extends BaseRepository
{
    protected $articlecomment;
    public function __construct(ArticleComment $articlecomment)
    {
        // $this->constructParam = func_get_args();
        $this->articlecomment = $articlecomment;

        $this->baseModel = $this->articlecomment;
        // 字段
        $this->baseParam = $this->baseModel->getOutsideGuarded();
        // $this->baseParam = ['user_name','password','email','phone'];
        $this->baseTransformer = 'articlecomment';
    }

    // 文章点赞
    public function isLiked($data){
        var_dump($data);die;
    }



}