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
        parent::__construct(); //调用父类验证
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
            return $this->_outdata($res);
        }else{
            return $this->_outdata(null,'请输入正确信息');
        }
    }



    /**
     * 商品规格属性名增加
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @need 表增加索引
     * @since 2017/9/27 SF
     * @return json
     */
    public function specKeyAdd(Request $request){
            // 验证提交
            $validator = \Validator::make($request->input(),$this->validateRule->getRule('integergoods.speckeyadd'));
            if ($validator->fails()) {
                return $this->errorBadRequest($validator);
            }

            $input = $request->input();
            // $rtn = $this->accountService->setInclude($include)->getById($id);
            $res = $this->integergoodsService->specKeyAdd($input);
//            return $this->_outdata($res);
    }

    /**
     * 插入多数据测试
     *
     * @access public
     * @param mixed $request get发送过来的数据（默认200万）
     * @need 表增加索引
     * @since 2017/9/27 SF
     * @return json
     */
    public function testAddAll($goods_id){
        $this->integergoodsService->testAddAll($goods_id);
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
    public function getSpecAttrList($id){
        $this->integergoodsService->specAttrList($id);
    }


    /**
     * 商品规格属性值增加
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @need 表增加索引
     * @since 2017/9/27 SF
     * @return json
     */
    public function specValueAdd(Request $request){
        // 验证提交
        $validator = \Validator::make($request->input(),$this->validateRule->getRule('integergoods.specvalueadd'));
        if ($validator->fails()) {
            return $this->errorBadRequest($validator);
        }

        var_dump($request->input());die;


    }

























    /**
     * 积分商品规格增加
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @need 回滚补充 放在service里
     * @since 2017/9/21 SF
     * @return json
     */
    public function goodsspecAdd(Request $request){
        $this->integergoodsService->specAdd($request->input());
    }

}