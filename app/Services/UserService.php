<?php

namespace App\Services;

use App\Repositories\UserRepository;
/**
* 处理业务逻辑
*/
class UserService extends BaseService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->baseRepository = $this->userRepository;
        $this->salt = "userservice";
    }

    public function create($input){
      //接受控制器数据
      $password = sha1($this->salt.$input['password']);
      $new_user = [
          'username' => $input['username'],
          'email' => $input['email'],
          'password' => $password,
          'api_token' => str_random(60),
      ];
      $res = $this->userRepository->create($new_user);
      return $res->instanceId;
    }


    public function update($id, $input)
    {
        return $this->userRepository->getInstance($id)->update($input);
    }

    public function delete($id)
    {
        $res = $this->userRepository->deleteById($id);
        return $res;
    }

    public function getById($id)
    {
        $info = $this->userRepository->getById($id);
        return $info;
    }

    public function getList()
    {
        return $this->userRepository->getList();
    }

    public function getListByCondition($condition)
    {
        return $this->userRepository->getListByCondition($condition);
    }

    public function getAvailableByKey($key)
    {
        $rtn = $this->userRepository->getByKey($key);
        if ($rtn && $rtn['data']['account_id']===null){
            return $rtn;
        }else{
            return null;
        }
    }

    public function bindAccount($input)
    {
        $this->userRepository->getInstance($input['id'])->update(['account_id'=>$input['account_id'],'device_sn'=>$input['device_sn']]);
        return true;
    }
}
