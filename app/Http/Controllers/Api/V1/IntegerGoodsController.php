<?php
namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Services\IntegerGoodsService;
use App\Models\IntegerGoodsClass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class IntegerGoodsController extends BaseController
{
    protected $integergoodsService;

    public function __construct(IntegerGoodsService $integergoodsService)
    {
        $this->integergoodsService = $integergoodsService;
    }

    /**
     * 积分商品增加
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/9/21 SF
     * @return json
     */
    public function goodsAdd(Request $request){
        if($request->input()){
            $input = $request->input();
            $res = $this->integergoodsService->goodsAdd($input);
            return $this->_outdata($res->instanceId);
        }else{
            return $this->_outdata(null,'请输入正确信息');
        }
    }

    /**
     * 积分商品规格增加
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/9/21 SF
     * @return json
     */
    public function goodsspecAdd(Request $request){ 
        $this->integergoodsService->specAdd($request->input());
    }


}