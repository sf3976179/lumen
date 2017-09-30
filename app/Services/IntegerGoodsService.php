<?php

namespace App\Services;
use Illuminate\Support\Facades\Cache;   //引入默认redis缓存
use App\Repositories\IntegerGoodsRepository;
/**
 * 处理业务逻辑
 */
class IntegerGoodsService extends BaseService
{
    private $integergoodsRepository;

    public function __construct(IntegerGoodsRepository $integergoodsRepository)
    {
        $this->integergoodsRepository = $integergoodsRepository;
        $this->baseRepository = $this->integergoodsRepository;
    }

    /**
     * 积分商品增加
     *
     * @access public
     * @param mixed $input 接收C发送的数据
     * @since 2017/9/21 SF
     * @return string
     */
    public function goodsAdd(array $input){
        return $this->baseRepository->createGoods($input);
    }


    /**
     * 商品规格属性名增加
     *
     * @access public
     * @param mixed $input 接收C发送的数据
     * @since 2017/9/26 SF
     * @return string
     */
    public function specKeyAdd(array $input){
//        return parent::create($input);
        return $this->baseRepository->specAdd($input);
    }

    /**
     * 插入对规格数据测试
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @need 表增加索引
     * @since 2017/9/27 SF
     * @return json
     */
    public function testAddAll($goods_id){
        $this->baseRepository->testAddAll($goods_id);
    }

    /**
     * 商品规格属性名列表
     *
     * @access public
     * @param mixed $request get发送过来的数据（默认200万）
     * @need 表增加索引
     * @since 2017/9/29 SF
     * @return json
     */
    public function specAttrList($id){
        $this->baseRepository->getSpecList($id);
    }


    /**
     * 积分商品规格增加
     *
     * @access public
     * @param mixed $input 接收C发送的数据
     * @since 2017/9/21 SF
     * @return string
     */


















    /**
     * 积分商品规格增加
     *
     * @access public
     * @param mixed $input 接收C发送的数据
     * @since 2017/9/21 SF
     * @return string
     */
    public function specAdd(array $data){
        
    }



}