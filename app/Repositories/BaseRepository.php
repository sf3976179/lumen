<?php

namespace App\Repositories;

use App\Transformers\GetTransformer;
use Illuminate\Support\Collection;
use League\Fractal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

/**
* 处理数据逻辑
*/
class BaseRepository implements BaseRepositoryInterface
{
    protected $constructParam;
    protected $baseModel;
    protected $baseParam;
    protected $baseTransformer;
    protected $sort=[];

    public $instanceId;

    public function __construct()
    {
    }

    public function getBaseModelArray()
    {
        return $this->baseModel->toArray();
    }

    public function create($input)
    {
        // 加载类（降低耦合度）
        $model = $this->baseModel->newInstance();
        foreach ($this->baseParam as $v) {
            isset($input[$v]) ? $model->$v = $input[$v] : null;
        }
        $model->save();
        $this->instanceId = $model->id;
        $this->baseModel = $model;
        // 链式操作
        return $this;
    }

    public function update($input)
    {
        $model = $this->baseModel;
        foreach ($this->baseParam as $v) {
            isset($input[$v]) ? $model->$v = $input[$v] : null;
        }
        return $model->save();
    }

    public function updateById($id, $input)
    {
        $model = $this->baseModel->find($id);
        foreach ($this->baseParam as $v) {
            isset($input[$v]) ? $model->$v = $input[$v] : null;
        }
        return $model->save();
    }

    public function delete()
    {
        $id = $this->instanceId;
        return $this->baseModel->destroy([$id]);
    }

    public function get($include='')
    {
        $rtn = $this->baseModel->all();

        if ($rtn) {
            return $this->transformCollectionData($rtn, $this->baseTransformer, $include);
        }

        return $rtn;
    }

    public function getAll($include='')
    {
        $allData = $this->baseModel->all();
        return $this->transformCollectionData($allData, $this->baseTransformer, $include);
    }

    public function getById($id, $include='')
    {
        $rtn = $this->baseModel->find($id);
        if ($rtn) {
            return $this->transformItemData($rtn, $this->baseTransformer, $include);
        }
        return $rtn;
    }

    /**
     * @api {method} BaseRepository->getByCondition($input, $include) 条件获取对应模块信息(getByCondition)
     * @apiName getByCondition
     * @apiDescription 条件获取对应模块信息
     * @apiGroup BaseRepository
     * @apiVersion 3.0.0
     * @apiParam {array} input ['phone'=>15967654063,'type' => 1]
     * @apiParam {string} include 1234
     * @apiSuccessExample {array} 返回:
     *   返回一维数组
     */
    public function getByCondition($input, $include='')
    {
        $where = [];
        //过滤条件
        foreach ($this->baseParam as $param) {
            isset($input[$param]) ? $where[$param] = $input[$param] : null;
        }
        $rtn = $this->baseModel->where($where)->first();
        if ($rtn) {
            $rtn = $this->transformData($rtn, $this->baseTransformer, $include);
        }

        return $rtn;
    }

    public function getList($num=0, $page=1, $include='')
    {
        $data = $this->baseModel;
        if (!empty($this->sort)) {
            foreach ($this->sort as $sort_k=>$sort_v) {
                $data = $data->orderBy($sort_k, $sort_v);
            }
        }
        if ($num==0) {
            $data = $data->get();
        } else {
            $data = $data->paginate($num);
        }

        return $this->transformCollectionData($data, $this->baseTransformer, $include);
    }

    /**
     * @need sql索引
     */
    public function getListByCondition($condition, $include='')
    {
        $where = [];
        foreach ($this->baseParam as $param) {
            if (isset($condition[$param])) {
                $where[$param] = $condition[$param];
            }
        }

        $build = $this->baseModel->where($where);
        if (!empty($this->sort)) {
            foreach ($this->sort as $sort_k=>$sort_v) {
                $build = $build->orderBy($sort_k, $sort_v);
            }
        }
        $page_num = isset($condition['page_num'])?$condition['page_num']:0;
        if ($page_num==0) {
            $data = $build->get();
        } else {
            $data = $build->paginate($page_num);
        }

        return $this->transformCollectionData($data, $this->baseTransformer, $include);
    }

    public function deleteById($id)
    {
        return $this->baseModel->destroy($id);
    }
    public function deleteByIds($ids)
    {
        return $this->baseModel->destroy($ids);
    }

    public function deleteByCondition($input)
    {
        //过滤条件
        $model = $this->baseModel;
        foreach ($this->baseParam as $param) {
            if (isset($input[$param])) {
                $model = $model->where($param, $input[$param]);
            }
        }
        return $model->delete();
    }

    //处理单个模型
    public function transformItemData($item, $transformerName, $include = '')
    {
        $get_transformer = new GetTransformer();
        $transformer = $get_transformer->getByName($transformerName);
        $resource = new Fractal\Resource\Item($item, $transformer);
        $fractal = new Fractal\Manager();
        return $fractal->parseIncludes($include)->createData($resource)->toArray();
    }
    //处理列表模型
    public function transformCollectionData($collection, $transformerName, $include = '')
    {
        $get_transformer = new GetTransformer();
        $transformer = $get_transformer->getByName($transformerName);
        $resource = new Fractal\Resource\Collection($collection, $transformer);
        $fractal = new Fractal\Manager();
        return $fractal->parseIncludes($include)->createData($resource)->toArray();
    }
    //自动判断使用单个或列表模型,判断存在误差
    public function transformData($data, $transformerName, $include = '')
    {
        $get_transformer = new GetTransformer();
        $transformer = $get_transformer->getByName($transformerName);

        if ($data instanceof Collection) {
            $resource = new Fractal\Resource\Collection($data, $transformer);
        } else {
            $resource = new Fractal\Resource\Item($data, $transformer);
        }
        $fractal = new Fractal\Manager();
        return $fractal->parseIncludes($include)->createData($resource)->toArray();
    }

    public function getInstance($id)
    {
        $object = new static(...$this->constructParam);  //实例化带参数的当前类
        $object->instanceId = $id;                       //赋值继承的属性
        $object->baseModel = $object->baseModel->findOrFail($object->instanceId);  //使用已经赋值属性查找其实例
        return $object;
    }
}
