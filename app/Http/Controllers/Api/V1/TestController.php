<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;  //响应生成器
use Illuminate\Http\Request;

use App\Events\TestEvent;

class TestController extends Controller
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

    public function index(Request $request)
    {
      return '123';
    }


    //
    public function show(Request $request)
    {
      /**
      * 例：
      * $user = User::findOrFail($id);
		  * return $this->response->array($user->toArray());
      */
      // $data = array('data' => 'dingo ok1','message' => '3','code' => '200');
      // 响应数组
      // $data = $this->response->array(array('data' => 'dingo ok2','message' => '3','code' => '200'));
      $data = $request->all();
      return $data;
    }

    public function show1($id)
    {
      Event::fire(new TestEvent($id));

      return $id;
      // 响应一个元素  
      // return $this->response->item(array('id'=>$id), new ExampleController);
      // 错误响应
      // return $this->response->error('This is an error.'.$id, 404);
    }

    public function test3(Request $request){
      // $user = User::find($id);
      // if ($user->updated_at > app('request')->get('last_updated')) {
      //   throw new Symfony\Component\HttpKernel\Exception\ConflictHttpException('User was updated prior to your request.');
      // }
      dd('报错');
    }
}
