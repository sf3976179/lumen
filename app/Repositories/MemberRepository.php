<?php

namespace App\Repositories;

use App\Models\Member;
use App\Models\SignRewardSet; //奖励设置
use App\Models\SignLog;
use Illuminate\Database\DetectsDeadlocks; //奖励记录

class MemberRepository extends BaseRepository
{
    protected $member;
    public function __construct(Member $member,SignRewardSet $signreward,SignLog $signlog)
    {
        // $this->constructParam = func_get_args();
        $this->member = $member;
        $this->signreward = $signreward;
        $this->signlog = $signlog;

        $this->baseModel = $this->member;
        // 字段
        $this->baseParam = $this->baseModel->getOutsideGuarded();
        // $this->baseParam = ['user_name','password','email','phone'];
        $this->baseTransformer = 'member';
    }

    // 查询当前奖励
    public function find_reward($data){
        $res = $this->signreward->where(['date_day' => $data['d'],'date_month' => $data['m']])->first();
        return isset($res)?$res->toArray():'';
    }

    // 查询当前会员签到天数
    public function findMemberSign($data='',$reward){
        $member_id = $data['member_id'];
        // 连续签到条件判断
        if($data != ''){
            //查询当前是否已经签到
            $str = substr($data['sign_date'],'0','10');
            $sql = app('db')->select("SELECT * FROM lu_sign_log WHERE DATE(lu_sign_log.sign_date)='$str' and lu_sign_log.member_id='$member_id'");
            if($sql){
                return null;
            }
            //查询会员连续签到天数
            $result = $this->baseModel->where('id','=',$member_id)->first()->toArray();
            if($data['sign'] == '2'){
                // 会员表连续签到天数改变
                $res1 = $this->updateById($member_id,array('member_m_sign' => $result['member_m_sign'] + 1));
            }else{
                $res1 = $this->updateById($member_id,array('member_m_sign' => '1'));
            }
            // 存入日志
            $this->signlog->sign_reward_id = $data['sign_reward_id'];
            $this->signlog->member_id = $member_id;
            $this->signlog->sign_date = $data['sign_date'];
            $this->signlog->sign_comment = $data['sign_comment'];
            $this->signlog->save();
            return $this->signlog->id;
        }
    }






}
