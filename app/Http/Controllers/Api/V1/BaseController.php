<?php

namespace App\Http\Controllers\Api\V1;

use App\ValidateRule;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Dingo\Api\Exception\ValidationHttpException;

class BaseController extends Controller
{
    protected $validateRule;
    protected $statusCode=200;
    protected $authenticatedUser;
    // 接口帮助调用
    use Helpers;

    public function __construct()
    {
        $this->validateRule = new ValidateRule();
    }

    // 返回错误的请求
    protected function errorBadRequest($validator)
    {
        // github like error messages
        // if you don't like this you can use code bellow
        //
        //throw new ValidationHttpException($validator->errors());

        $result = [];
        $messages = $validator->errors()->toArray();

        if ($messages) {
            foreach ($messages as $field => $errors) {
                foreach ($errors as $error) {
                    $result[] = [
                        'field' => $field,
                        'code' => $error,
                    ];
                }
            }
        }

        throw new ValidationHttpException($result);
    }

    protected function _setStatusCode($code)
    {

        $this->statusCode = $code;
        return $this;
    }
    protected function _out($err)
    {
        if(!is_array($err)){
            $err = ['code'=>$err['code']];
        }

        //msg
        if(!isset($err['msg']) || trim($err['msg'])===''){
            $err['msg'] = '';
        }

        //debug
        if(!isset($err['debug'])){
            $err['debug'] = '';
        }

        return $this->response->array($err)->setStatusCode($this->statusCode);
    }

    protected function _outSuccess($data=null,$msg=null)
    {
        if ($data===null){
            return $this->_out(['code'=>400,'api_token'=>$data,'msg'=>$msg]);
        }else{
            return $this->_out(['code'=>200,'api_token'=>$data,'msg'=>$msg]);
        }
    }

    // 懒得跟上一个方法合并
    protected function _outdata($data=null)
    {
        if ($data===null){
            return $this->_out(['code'=>400]);
        }else{
            return $this->_out(['code'=>200,'result'=>$data]);
        }
    }

    protected function _getUser()
    {
        return $this->auth->user();
    }
}
