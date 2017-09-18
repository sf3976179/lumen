<?php

namespace App\Transformers;

use App\Models\Article;
use League\Fractal\ParamBag;
use League\Fractal\TransformerAbstract;
// dingo转化器具体百度
class ArticleTransformer extends TransformerAbstract
{

    public function transform(Article $article)
    {
        return $article->attributesToArray();
    }
}
