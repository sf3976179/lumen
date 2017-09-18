<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/9/18
 * Time: 17:20
 * class 积分中心
 */

namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Services\IntegralCenterService;
use App\Models\IntegralCenter;
use Illuminate\Support\Facades\Cache;   //引入默认redis缓存
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class IntegralCenterController extends BaseController
{
    protected $integralcenterService;

    public function __construct(IntegralCenterService $integralcenterService)
    {
        $this->integralcenterService = $integralcenterService;
    }

    /**
     * 商品分类增加
     *
     * @access public
     * @param mixed post发送过来的数据
     * @since 2017/9/18 SF
     * @return json
     */
    public function goodsListAdd(){

    }

    /**
     * 商品分类列表
     *
     * @access public
     * @param mixed post发送过来的数据
     * @since 2017/9/18 SF
     * @return json
     */
    public function getGoodsList(){
        
    }




}