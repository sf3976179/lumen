<?php

namespace App\Repositories;

use App\Models\IntegerGoods;
use DB;
use App\Exceptions\CustomException;

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

    /**
    *
    * 积分商品录入
    */
    public function createGoods($input){
        DB::beginTransaction();
        try {
            // 加载类（降低耦合度）
            $model = $this->baseModel->newInstance();
            foreach ($this->baseParam as $v) {
                isset($input[$v]) ? $model->$v = $input[$v] : null;
            }
            $model->save();
            $this->instanceId = $model->id;
            $this->baseModel = $model;
             $a = $input['a'];
            // 数据提交
            DB::commit();
            return $this->instanceId;
        } catch (\Exception $e) {
            // 数据回滚
            DB::rollBack();
            // return $model->id;
            throw new CustomException(500,'40301', $e->getMessage());
        }
    }





}