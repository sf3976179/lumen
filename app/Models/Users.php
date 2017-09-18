<?php

namespace App\Models;

class Users extends BaseModel
{
    // protected $connection = 'system_hub';

    //可被批量赋值的字段
    protected $fillable = [
        'user_name','email','password','api_token'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array 隐藏字段
     */
    protected $hidden = [
        'password',
    ];

    public function member(){
      return $this->belongsTo('Member','member_id','id');
    }

    // public function province()
    // {
    //     return $this->belongsTo(Province::class);
    // }
}
