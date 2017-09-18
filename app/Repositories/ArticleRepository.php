<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Article_content;

class ArticleRepository extends BaseRepository
{
    protected $article;
    public function __construct(Article $article,Article_content $article_content)
    {
        // $this->constructParam = func_get_args();
        $this->article = $article;
        $this->article_content = $article_content;

        $this->baseModel = $this->article;
        $this->baseModel1 = $this->article_content;
        // 字段
        $this->baseParam = $this->baseModel->getOutsideGuarded();
        $this->baseParam1 = $this->baseModel1->getOutsideGuarded();
//        $this->baseParam = ['id','ac_name','ac_parent_id','ac_subtitle','member_id'];
        $this->baseTransformer = 'article';
    }

    // 文章列表
    public function getarticleList($input,$include=''){
        $where = [];
        //过滤条件
        foreach ($this->baseParam as $param) {
            isset($input[$param]) ? $where[$param] = $input[$param] : null;
        }
        $rtn = $this->baseModel->where($where)->get()->toArray();
        return $rtn;
    }

    // 文章增加
    public function articleAdd($article_data){
        // 加载类（降低耦合度）
        $model = $this->baseModel1->newInstance();
        foreach ($this->baseParam1 as $v) {
            isset($article_data[$v]) ? $model->$v = $article_data[$v] : null;
        }
        $model->save();
        $this->instanceId = $model->id;
        $this->baseModel1 = $model;
        // 链式操作
        return $this;
    }

    // 文章点赞
    public function isLiked($data){

    }






}
