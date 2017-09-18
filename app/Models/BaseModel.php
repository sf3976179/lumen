<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    // use SoftDeletes;// 增加删除时间，并非真正删除
    // 不允许被赋值
    protected $guarded = ['created_at','updated_at','deleted_at'];

//    protected $dates = ['created_at', 'updated_at'];

    // protected $hidden = ['updated_at', 'deleted_at'];

    // protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * 获取表结构
     * @return array
     */
    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    protected function asJson($value)
    {
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }

    //获取guarded之外的参数
    public function getOutsideGuarded()
    {
        return array_values(array_diff($this->getTableColumns(),$this->getGuarded()));
    }
}
