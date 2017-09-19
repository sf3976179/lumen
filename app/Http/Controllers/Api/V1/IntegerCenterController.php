<?php
namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Services\IntegerCenterService;
use App\Models\IntegerGoodsClass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class IntegerCenterController extends BaseController
{
    protected $integercenterService;

    public function __construct(IntegerCenterService $integercenterService){
        $this->integercenterService = $integercenterService;
    }

    /**
     * 积分商品分类增加
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/9/19 SF
     * @return json
     */
    public function integerGoodsclassAdd(Request $request){
        if($request->input()){
            $res = $this->integercenterService->goodsClassAdd($request->input());
            var_dump($res);die;
        }
    }



}
