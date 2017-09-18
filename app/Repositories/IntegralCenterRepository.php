<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/9/18
 * Time: 17:44
 */

namespace App\Repositories;

use App\Models\IntegralCenter;

class IntegralCenterRepository extends BaseRepository
{
    protected $integralCenter;

    public function __construct(IntegralCenter $integralCenter)
    {
        // $this->constructParam = func_get_args();
        $this->integralCenter = $integralCenter;

        $this->baseModel = $this->integralCenter;
        // 字段
        $this->baseParam = $this->baseModel->getOutsideGuarded();
        // $this->baseParam = ['user_name','password','email','phone'];
        $this->baseTransformer = 'integralCenter';
    }



}