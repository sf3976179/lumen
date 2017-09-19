<?php
/**
 * Created by PhpStorm.
 * User: Rhythm
 * Date: 2017/9/19
 * Time: 18:08
 */

namespace App\Repositories;

use App\Models\IntegerGoodsClass;

class IntegerCenterRepository extends BaseRepository
{
    protected $integerGoodsClass;

    public function __construct(IntegerGoodsClass $integerGoodsClass)
    {
        // $this->constructParam = func_get_args();
        $this->integerGoodsClass = $integerGoodsClass;

        $this->baseModel = $this->integerGoodsClass;
        // 字段
        $this->baseParam = $this->baseModel->getOutsideGuarded();
        // $this->baseParam = ['user_name','password','email','phone'];
        $this->baseTransformer = 'integerGoodsClass';
    }

    // 验证商品分类
    public function verifyClass($id){
        $res = $this->baseModel->find($id)->toArray();
        if(!$res){
            return false;
        }else if($res['level'] == '2'){
            $this->verifyClass($res['parent_id']);
        }
        return true;
    }



}