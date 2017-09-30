<?php

namespace App\Repositories;

use App\Models\IntegerGoods;
use App\Models\IntegerGoodsSpecKey; //商品规格属性
use DB;
use App\Exceptions\CustomException;

class IntegerGoodsRepository extends BaseRepository
{
    protected $integergoods;

    public function __construct(IntegerGoods $integergoods,IntegerGoodsSpecKey $integergoodsspeckey)
    {
        // $this->constructParam = func_get_args();
        $this->integerGoods = $integergoods;

        $this->integergoodsspeckey = $integergoodsspeckey;

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

    /*
     * 规格属性增加
     */
    public function specAdd($input){
        $res = IntegerGoodsSpecKey::create($input);
        return $res->id;
    }

    /*
     * 测试多数据插入时间
     */
    public function testAddAll($goods_id){
        set_time_limit(0);
        DB::beginTransaction();
        try {
            $time_start = time();//开始计时, 放在程序头
            $i=1;
            $input = [
            'goods_id' => $goods_id,
            ];

            while($i<2){
                $input['attr_name'] = '测试数据'.$i;
                $input['add_time'] = time();
                IntegerGoodsSpecKey::create($input);
                $i++;
//                if($i%10000==0){
//                    //每隔1万条提交下
//                    DB::COMMIT();
//                    DB::beginTransaction();
//                }
            }
            DB::COMMIT();
            $time_end = time();//结束计时, 放在尾部
            $time = $time_end - $time_start;
            echo '程序开始时'.$time_start.'————'.'程序结束时'.$time_end;
            echo '一共执行了'.$time;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $i;
        }
    }

    /*
     * 商品规格属性名列表（默认200万数据）
     */
    public function getSpecList(int $id){
        $time_start = getmicrotime();//开始计时, 放在程序头
        $where = [
            'goods_id' => $id
        ];
//        $data = IntegerGoodsSpecKey::where($where)->limit(200000)->get()->toArray();


//        $data = $this->integergoodsspeckey->where($where)->limit(500000)->get();

        // DB::select("select * from lu_integer_goods_spec_key force index(id) where lu_integer_goods_spec_key.goods_id =".$id." limit 2000000");

        DB::select("select * from lu_integer_goods_spec_key where add_time < '2017-09-29 14:29:03' AND goods_id = 10 limit 1500000");

        $time_end = getmicrotime();//结束计时, 放在尾部
        $time = $time_end - $time_start;
        echo '真TM慢'.$time;die;
    }









}