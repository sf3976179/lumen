<?php

namespace App\Transformers;

use App\Models\Member;
use League\Fractal\ParamBag;
use League\Fractal\TransformerAbstract;
// dingo转化器具体百度   
class MemberTransformer extends TransformerAbstract
{

    public function transform(Member $member)
    {
        return $member->attributesToArray();
    }
}
