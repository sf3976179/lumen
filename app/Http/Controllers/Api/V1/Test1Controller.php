<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;  //响应生成器
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Event;
use App\Http\Requests;
use App\Events\Test1;

class Test1Controller extends Controller
{
    // 接口帮助调用
    use Helpers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function test1(Request $data){
      $data = event(new Test1($data));
      var_dump('123');die;
    }
}
