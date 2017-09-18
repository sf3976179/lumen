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
        // 加载类（降低耦合度）
        $model = $this->baseModel->newInstance();
        if($data){
            $model->user_id = $data->user_id;
            $model->article_id = $data->article_id;
            $model->type = $data->type;
            $model->star = $data->star;
            $model->save();
            return $model->id;
        }
    }

    // 文章评论检测是否存在
    public function getByCommentId($id){
        return $this->baseModel->find($id);
    }



}