<?php
namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Services\UserService;
// use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class UserController extends BaseController
{
  // private $salt;
  protected $userService;

  public function __construct(UserService $userService){
    // $this->salt = "userloginregister";
    $this->userService = $userService;
  }
  
  //登录
  public function login(Request $request)
  {
    if($request->has('username') && $request->has('password')){
      $user = User::where('username', '=', $request->input('username'))->where('password', '=', sha1($this->salt.$request->input('password')))->first();
      if($user){
        $token = str_random(60);
        $user->api_token = $token;
        $user->save();
        return $user->api_token;
      }else{
        return '用户名或密码不正确,登录失败';
      }
    }else{
      return '登录信息不完整,请输入用户名和密码';
    }
  }

  //信息
  public function info()
  {
    return Auth::user();
  }
}
