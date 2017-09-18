<?php

namespace App\Models;


class Member extends BaseModel
{
  protected $table = 'member';
  //可被批量赋值的字段
  protected $fillable = [
      'id','user_name','email','phone'
  ];

  protected $hidden = [
      'password',
  ];
  public function User(){
    return $this->hasone('Users','member_id','id');
  }
}
