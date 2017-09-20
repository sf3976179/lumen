<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;   //引入默认redis缓存
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
          'phone' => $input['phone'],
          'member_integral' => '20'
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

    /**
     * 会员签到
     *
     * @access public
     * @since 2017/9/20 SF
     * @return array
     */
    public function memberSign($input){
        $month = date('m',$input['date']); //月
        $day = date('d',$input['date']); //日
        $res = $this->memberRepository->find_reward(array('m'=>$month,'d'=>$day)); //获取当前奖励设置记录
        $member_id = Cache::get('member_id');
        // 签到日志数据
        $res2 = array(
            'sign_reward_id' => $res['id'], //签到奖励ID
            'member_id' => $member_id,
            'sign_date' => date("Y-m-d H:i:s",$input['date']) //签到日期
        );
        if($res){
            //查询当前是否为连续签到
            $res1 = $this->memberRepository->find_reward(array('m'=>$month,'d'=>$day-1));
            if($res1 && $day !='1'){
                //查询当前会员签到天数+1，记录到奖励日志
                $res2['sign'] = '1';
                $res2['sign_comment'] = '连续签到+1';
            }else{
                $res2['sign_comment'] = '当日签到';
            }
            return $this->memberRepository->findMemberSign($res2,$res);
        }

    }





  }
