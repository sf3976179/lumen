<?php

namespace App\Repositories;

use App\Models\Users;

class UserRepository extends BaseRepository
{
    protected $user;
    public function __construct(Users $user)
    {
        // $this->constructParam = func_get_args();
        $this->user = $user;

        $this->baseModel = $this->user;
        // 字段
        $this->baseParam = $this->baseModel->getOutsideGuarded();
        $this->baseTransformer = 'user';
    }

    // public function getByKey($key)
    // {
    //     $res = $this->accountuser->where('key',$key)->first();
    //     if ($res) {
    //         return $this->transformItemData($res,$this->baseTransformer);
    //     }
    //     return null;
    // }
    //
    // public function getByUserId($user_id)
    // {
    //     $res = $this->accountuser->where('user_id',$user_id)->first();
    //     if ($res) {
    //         return $this->transformItemData($res,$this->baseTransformer);
    //     }
    //     return null;
    // }


}
