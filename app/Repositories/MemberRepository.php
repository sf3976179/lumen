<?php

namespace App\Repositories;

use App\Models\Member;

class MemberRepository extends BaseRepository
{
    protected $member;
    public function __construct(Member $member)
    {
        // $this->constructParam = func_get_args();
        $this->member = $member;

        $this->baseModel = $this->member;
        // 字段
        $this->baseParam = $this->baseModel->getOutsideGuarded();
        // $this->baseParam = ['user_name','password','email','phone'];
        $this->baseTransformer = 'member';
    }




}
