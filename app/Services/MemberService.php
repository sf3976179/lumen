<?php

namespace App\Services;

use App\Repositories\MemberRepository;
use App\Repositories\UserRepository;
/**
* 处理业务逻辑
*/
class MemberService extends BaseService
{
    private $memberRepository;
    private $userRepository;
    public function __construct(MemberRepository $memberRepository,UserRepository $userRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->userRepository = $userRepository;
        $this->baseRepository = $this->memberRepository;
        $this->salt = "memberservice";
    }

    /**
    * 会员注册
    *
    * @access public
    * @param mixed $input 接收C发送的数据
    * @since 2017/9/7 SF
    * @return string
    */
    public function create($input){
      //接受C数据
      $password = sha1($this->salt.$input['password']);
      $new_user = [
          'user_name' => $input['user_name'],
          'email' => $input['email'],
          'password' => $password,
          'phone' => $input['phone']
      ];
      $res = $this->memberRepository->create($new_user);
      if($res){
        $new_user['member_id'] = $res->instanceId;
        $new_user['api_token'] = str_random(60);
        $res1 = $this->userRepository->create($new_user);
        return $res1->instanceId;
      }
    }

    /**
    * 会员登录
    *
    * @access public
    * @param mixed $input 接收C发送的数据
    * @since 2017/9/7 SF
    * @need 当用户长时间不操作删除key
    * @return string
    */
    public function getByCondition($input){
      $password = sha1($this->salt.$input['password']);
      $login_user = [
        'user_name' => $input['user_name'],
        'password' => $password
      ];
      $res = $this->memberRepository->getByCondition($login_user);
      if($res){
        // 验证存在用户将其写入临时表返回key
        $login_user['member_id'] = $res['data']['id'];
        $login_user['email'] = $res['data']['email'];
        // $login_user['api_token'] = str_random(60);
        $res1 = $this->userRepository->create($login_user);
        return $res1->instanceId;
      }
    }

    /**
    * 会员列表
    *
    * @access public
    * @since 2017/9/11 SF
    * @return array
    */
    public function getMemberList(){
        return $this->memberRepository->getAll();
    }

    /**
     * 会员信息
     *
     * @access public
     * @since 2017/9/12 SF
     * @return array
     */
     public function getMemberInfo($data){
         $input = [];
         $input['api_token'] = $data;
         $user_data = $this->userRepository->getByCondition($input);  // 获取临时表的用户数据
         if($user_data){
             $member = array(
                 'id' => $user_data['data']['member_id']
             );
             return $this->memberRepository->getByCondition($member);
         }
     }





  }
