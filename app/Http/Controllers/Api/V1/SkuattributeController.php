<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\SkulogEvent;
use App\Services\SkuattributeService;
use Illuminate\Http\Request;

class SkuattributeController extends BaseController
{
    protected $skuattributeService;

    public function __construct(SkuattributeService $skuattributeService)
    {
        parent::__construct();
        $this->middleware('api.auth');
        $this->skuattributeService = $skuattributeService;
    }


    /**
     * @api {get} /api/skuattributes 获取sku属性列表
     * @apiName index
     * @apiDescription 获取sku属性列表
     * @apiGroup SkuattributeController
     * @apiVersion 1.0.0
     * @apiSuccess {integer} id sku属性id
     * @apiSuccess {integer} skuattributetype_id sku属性类型id
     * @apiSuccess {string} name sku属性规格名称
     * @apiSuccessExample Success-Response:
     * {
     *       "code": 0,
     *       "result": {
     *          "data": {
     *              "id": 1,
     *              "skuattributetype_id": 1,
     *              "name": "红色",
     *              "created_at": "2017-07-13 17:17:32"
     *          }
     *        },
     *       "message": "",
     *       "debug": ""
     *   }
     */
    public function index(Request $request)
    {
        $list = $this->skuattributeService->getList();
        return $this->_outSuccess($list);
    }

    /**
     * @api {get} /api/skuattributes/1 skuattribute获取sku属性详情
     * @apiName show
     * @apiDescription 获取sku属性详情
     * @apiGroup SkuattributeController
     * @apiVersion 1.0.0
     * @apiSuccess {integer} id sku属性id
     * @apiSuccess {integer} skuattributetype_id sku属性类型id
     * @apiSuccess {string} name sku属性规格名称
     * @apiSuccessExample Success-Response:
     * {
     *       "code": 0,
     *       "result": {
     *          "data": {
     *              "id": 1,
     *              "skuattributetype_id": 1,
     *              "name": "红色",
     *              "created_at": "2017-07-13 17:17:32"
     *          }
     *        },
     *       "message": "",
     *       "debug": ""
     *   }
     */
    public function show($id)
    {
//        event(new SkulogEvent('1',$b = array('3','4'),$c = array('5','6'),'table'));
//        dd(123);
        $rtn = $this->skuattributeService->getById($id);
        return $this->_outSuccess($rtn);
    }

    /**
     * @api {post} /api/skuattributes skuattribute新建sku属性
     * @apiName store
     * @apiDescription 新建sku属性
     * @apiGroup SkuattributeController
     * @apiVersion 1.0.0
     * @apiParam {integer} skuattributetype_id 属性类型id
     * @apiParam {string} name sku属性规格名称
     * @apiParam {ingteger} [sort] 排序
     * @apiParamExample EX
     * {
     *    "skuattributetype_id":"1",
     *    "name":"红色"
     * }
     * @apiSuccessExample Success-Response:
     * {
     *     "code": 0,
     *     "result": {
     *         "data": {
     *             "id": 9,
     *             "skuattributetype_id": 1,
     *             "name": "红色",
     *             "created_at": "2017-07-24 10:06:57"
     *         }
     *     },
     *     "message": "",
     *     "debug": ""
     * }
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $rtn = $this->skuattributeService->create($input);

        $skuattribute = $this->skuattributeService->getById($rtn);
        return $this->_outSuccess($skuattribute);

    }

    /**
     * @api {put} /api/skuattributes/$id skuattribute编辑sku属性规格
     * @apiName update
     * @apiDescription 编辑sku属性规格
     * @apiGroup SkuattributeController
     * @apiVersion 1.0.0
     * @apiParam {integer} id sku属性id
     * @apiParam {integer} skuattributetype_id sku属性类型id
     * @apiParam {string} name sku属性规格名称
     * @apiParam {ingteger} [sort] 排序
     * @apiParamExample EX
     * {
     *    "skuattributetype_id":"1",
     *    "name":"红色"
     * }
     * @apiSuccessExample Success-Response:
     * {
     *     "code": 0,
     *     "result": {
     *         "data": {
     *             "id": 9,
     *             "skuattributetype_id": 1,
     *             "name": "红色",
     *             "created_at": "2017-07-24 10:06:57"
     *         }
     *     },
     *     "message": "",
     *     "debug": ""
     * }
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $rtn = $this->skuattributeService->update($id, $input);

        $skuattribute = $this->skuattributeService->getById($id);
        return $this->_outSuccess($skuattribute);
    }

    /**
     * @api {delete} /api/skuattributes/$id skuattribute删除sku属性规格
     * @apiName destroy
     * @apiDescription 删除sku属性规格
     * @apiGroup SkuattributeController
     * @apiVersion 1.0.0
     * @apiParam {int} id 1
     * @apiSuccessExample Success-Response:
     * {
     *       "code": 0,
     *       "result": [],
     *       "message": "",
     *       "debug": ""
     *   }
     */
    public function destroy($id)
    {
        $rtn = $this->skuattributeService->delete($id);
        return $this->_outSuccess([]);
    }

    /**
     * @apiVersion 1.0.0
     * @api {POST} /api/skuattributes/sort sku属性排序
     * @apiGroup SkuattributeController
     * @apiDescription sku属性排序
     * @apiParamExample EX
     * [
     *    {
     *        "id":1,
     *        "sort":4
     *    }
     * ]
     * @apiSuccessExample EX
     * {
     *       "code": 0,
     *       "result": [],
     *       "message": "",
     *       "debug": ""
     *   }
     *
     * @param Request $request
     * @return mixed
     */
    public function sort(Request $request)
    {
        foreach ($request->all() as $v) {
            $this->skuattributeService->update($v['id'], ['sort' => $v['sort']]);
        }
        return $this->_outSuccess([]);
    }


}
