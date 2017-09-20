<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/9/18
 * Time: 17:38
 */

namespace App\Services;
use Illuminate\Support\Facades\Cache;   //引入默认redis缓存
use App\Repositories\IntegerCenterRepository;
/**
 * 处理业务逻辑
 */
class IntegerCenterService extends BaseService
{
    private $integercenterRepository;

    public function __construct(IntegerCenterRepository $integercenterRepository)
    {
        $this->integercenterRepository = $integercenterRepository;
        $this->baseRepository = $this->integercenterRepository;
    }

    /**
     * 积分商品分类增加
     * @access public
     * @param mixed C发送过来的用户数据
     * @since 2017/9/19 SF
     * @return json
     */
    public function goodsClassAdd($input){
        $data = array(
            'category_name' => $input['category_name'],
            'category_describe' => $input['category_describe'],
            'parent_id' => isset($input['parent_id']) ? $input['parent_id'] : '0',
            'level' => $input['level']
        );
        // 验证分类
        switch ($input['level'])
        {
            case '2':
                $this->integercenterRepository->verifyClass($data['parent_id']);
            case '3':
                $this->integercenterRepository->verifyClass($data['parent_id']);
            default:
        }
        return $this->integercenterRepository->create($data);
    }

    /**
     * 积分商品分类列表
     * @access public
     * @param mixed C发送过来的用户数据
     * @need function setCurrentScope() on boolean回头解决
     * @since 2017/9/20 SF
     * @return json
     */
    public function getGoodsList(int &$id){
        if($id){
            $res = array();
            $res[$id] = $this->integercenterRepository->integerGoodsList($id);
            $number=$res[$id]['0'];
            while($number['level'] != '3'){
                $res[$number['id']] = $this->integercenterRepository->integerGoodsList($number['id']);
                $number = $res[$number['id']]['0'];
                $number++;
            }
            return $res;
        }
    } 






}