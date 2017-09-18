<?php

namespace App\Transformers;

use App\Models\Users;
use League\Fractal\ParamBag;
use League\Fractal\TransformerAbstract;
// dingo转化器具体百度
class UserTransformer extends TransformerAbstract
{

    public function transform(Users $user)
    {
        return $user->attributesToArray();
    }
}
