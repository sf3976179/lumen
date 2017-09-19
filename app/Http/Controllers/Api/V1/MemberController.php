<?php
namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Services\MemberService;
use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class MemberController extends BaseController
{
  protected $memberService;

  public function __construct(MemberService $memberService){
    // $this->salt = "userloginregister";
    $this->memberService = $memberService;
  }

  /**
  * 会员注册
  *
  * @access public
  * @param mixed $request post发送过来的用户数据
  * @since 2017/9/7 SF
  * @return json
  */
  public function register(Request $request)
  {
    if($request->has('user_name') && $request->has('password') && $request->has('email')){
      // 交给service处理业务逻辑
      $result = $this->memberService->create($request->input());
      if($result){
        return json_encode(array('code'=>'200','status'=>'success','msg'=>'用户注册成功'));
      }else{
        return json_encode(array('code'=>'400','status'=>'failure','msg'=>'用户注册失败'));
      }
    }else{
      return json_encode(array('code'=>'400','msg'=>'请输入完整用户信息'));
    }
  }

  /**
  * 会员登录
  *
  * @access public
  * @param mixed $request post发送过来的用户数据
  * @since 2017/9/7 SF
  * @need 登陆频繁不可生成api_token
  * @need 还需要加当前账户api_token的有效期
  * @return json
  */
  public function login(Request $request)
  {
    if($request->has('user_name') && $request->has('password')){
      $result = $this->memberService->getByCondition($request->input());
      // 查询临时表数据
      $result1 = Users::where('id','=',$result)->first();
      $token = str_random(60);
      if($result1){
          $result1->api_token = $token;
          $res = $result1->save();
          $res1 = Users::where('id','=',$result)->first();
          return $this->_outSuccess($res1['api_token'],'登录成功');
      }else{
          return $this->_outSuccess(null,'请输入正确的账户名或密码');
      }
    }else{
      return $this->_outSuccess(null,'请输入完整用户信息');
    }
  }

  /**
  * 会员列表
  *
  * @access public
  * @param (string)token -- headers发送
  * @since 2017/9/11 SF
  * @return json（数据不存在返回401报错）
  */
  public function usersList(){
    //  Auth::user(); //验证token值，当前方法已调用Auth中间件
      $result = $this->memberService->getMemberList();
      $res = $this->_outdata($result['data']);
      if(is_array($res->original)){
          $res->original = json_encode($res->original);
      }
      return $res->original;
  }

  /**
  * 会员信息
  * @access public
  * @param mixed $request post发送过来的用户数据
  * @since 2017/9/12 SF
  * @return json
  */
  public function memberInfo(Request $request){
      $token = $request->header('token');   //认证api_token
      $member_data = $this->memberService->getMemberInfo($token);
      $res = $this->_outdata($member_data['data']);
      if(is_array($res->original)){
          $res->original = json_encode($res->original);
      }
      return $res->original;
  }

  public function listInfo($id){
    var_dump($id);die;
  }

}
