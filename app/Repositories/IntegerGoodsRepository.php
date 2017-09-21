<?php

namespace App\Repositories;

use App\Models\IntegerGoods;

class IntegerGoodsRepository extends BaseRepository
{
    protected $integergoods;

    public function __construct(IntegerGoods $integergoods)
    {
        // $this->constructParam = func_get_args();
        $this->integerGoods = $integergoods;

        $this->baseModel = $this->integerGoods;
        // 字段
        $this->baseParam = $this->baseModel->getOutsideGuarded();
//        $this->baseParam = ['id','ac_name','ac_parent_id','ac_subtitle','member_id'];
        $this->baseTransformer = 'integerGoods';
    }




}