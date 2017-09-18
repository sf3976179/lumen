<?php

namespace App\Services;
use Illuminate\Support\Facades\Cache;   //引入默认redis缓存
use App\Repositories\ArticleRepository;
/**
 * 处理业务逻辑
 */
class ArticleService extends BaseService
{
    private $articleRepository;
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->baseRepository = $this->articleRepository;
    }

    /**
     * 文章分类增加
     *
     * @access public
     * @param mixed $input 接收C发送的数据
     * @since 2017/9/13 SF
     * @return string
     */
    public function articleInsert($input){
        $member_id = Cache::get('member_id');
        $data = array(
            'ac_name' => $input['article_name'],
            'ac_parent_id' => isset($input['parent_id']) ? $input['parent_id']:'0',
            'ac_subtitle' => $input['subtitle'],
            'member_id' => $member_id
        );
        $res = $this->articleRepository->create($data);
        return $res->instanceId;
    }

    /**
     * 文章分类列表
     *
     * @access public
     * @param mixed $input 接收C发送的数据
     * @since 2017/9/13 SF
     * @return array
     */
    public function articleList($id){
        if($id == '0'){
            $where = array(
                'ac_parent_id' => '0'
            );
        }else{
            $where['ac_parent_id'] = $id;
        }
        return $this->articleRepository->getarticleList($where);
    }

    /**
     * 文章内容增加
     *
     * @access public
     * @param mixed $input 接收C发送的数据
     * @since 2017/9/14 SF
     * @return string
     */
    public function articleContentAdd($input){
        $user_id = Cache::get('member_id');
        if($user_id) {
            $article_data = [];
            $article_data = $input;
            // 会员id
            $article_data['user_id'] = $user_id;
            $article_data['add_time'] = time();
            $article_data['update_time'] = time();
            $result = $this->articleRepository->articleAdd($article_data);
            return $result->instanceId;
        }
    }












}
