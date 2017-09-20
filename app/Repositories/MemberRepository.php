<?php

namespace App\Repositories;

use App\Models\Member;
use App\Models\SignRewardSet; //奖励设置
use App\Models\SignLog; //奖励记录

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
        if($data){
            return $this->signreward->where(['date_day' => $data['d'],'date_month' => $data['m'],])->first()->toArray();
        }
    }

    // 查询当前会员签到天数
    public function findMemberSign($data='',$reward){
        $member_id = $data['member_id'];
        // 连续签到条件判断
        if($data != ''){
            $result = $this->baseModel->where('id','=',$member_id)->first()->toArray();
            if($data['sign'] == '1'){
                $res1 = $this->create(array('id' => $member_id, 'member_m_sign' => $result['member_m_sign'] + 1));
            }else{
                $res1 = $this->create(array('id' => $member_id, 'member_m_sign' => '1'));
            }
            // 存入日志
            $this->signlog->sign_reward = $data['sign_reward'];
            $this->signlog->member_id = $member_id;
            $this->signlog->sign_date = $data['sign_date'];
            $this->signlog->sign_comment = $data['sign_comment'];
            $this->signlog->save();
            return $this->signlog->id;
        }
    }






}
