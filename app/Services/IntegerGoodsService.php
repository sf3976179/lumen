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