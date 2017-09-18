<?php

namespace App\Services;

use DB;
/**
* 处理业务逻辑 
*/
class BaseService implements BaseServiceInterface
{
    protected $baseRepository;
    protected $include = '';
    protected $baseData;

    /**
     * @api {method} BaseService->getById($id,$include) 通过id获取商品(getById)
     * @apiName getById
     * @apiDescription 通过id获取相关模块内容详情
     * @apiGroup baseRepository
     * @apiVersion 0.1.0
     * @apiParamExample {int} $id
     *   1 // 模块id
     * @apiSuccessExample {array} 返回:
     *   返回相关模块内容详情
     */
    public function getById($id)
    {
        $info = $this->baseRepository->getById($id, $this->include);
        return $info;
    }

    /**
     * @api {method} BaseService->getByCondition($input) 通过$input获取相关模块内容详情(getByCondition)
     * @apiName getByCondition
     * @apiDescription 通过$input获取相关模块内容详情
     * @apiGroup baseRepository
     * @apiVersion 0.1.0
     * @apiParamExample {array} $input
     * [
     *   'phone'=>15967654063
     * ]
     * @apiSuccessExample {array} 返回:
     *   返回相关模块内容详情
     */
    public function getByCondition($input)
    {
        $info = $this->baseRepository->getByCondition($input,$this->include);
        return $info;
    }

    public function create($input)
    {
        $rtn = $this->baseRepository->create($input);
        return $rtn->instanceId;
    }

    public function batchInsert(array $insertData)
    {
        $rtn = $this->baseRepository->batchInsert($insertData);
        return $rtn;
    }

    public function update($id, $input)
    {
        $this->baseRepository->getInstance($id)->update($input);
        return true;
    }

    public function delete($id)
    {
        return $this->baseRepository->delete($id);
    }

    public function deleteById($id)
    {
        return $this->baseRepository->deleteById($id);
    }

    public function updateById($id, $input)
    {
        return $this->baseRepository->updateById($id, $input);
    }

    public function getAll()
    {
        return $this->baseRepository->getList();
    }

    /**
     * @param mixed $include
     * @return BaseService
     */
    public function setInclude($include)
    {
        $this->include = $include;
        return $this;
    }

    public function setBaseData($data)
    {
        $this->baseData = $data;
    }

    public function getBaseData()
    {
        return $this->baseData;
    }
}
