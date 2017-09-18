<?php
/**
 * Created by PhpStorm.
 * User: Rhythm
 * Date: 2017/9/18
 * Time: 17:38
 */

namespace App\Services;
use Illuminate\Support\Facades\Cache;   //引入默认redis缓存
use App\Repositories\IntegralCenterRepository;
/**
 * 处理业务逻辑
 */
class IntegralCenterService extends BaseService
{
    private $integralcenterRepository;

    public function __construct(IntegralCenterRepository $integralcenterRepository)
    {
        $this->integralcenterRepository = $integralcenterRepository;
        $this->baseRepository = $this->integralcenterRepository;
    }




}