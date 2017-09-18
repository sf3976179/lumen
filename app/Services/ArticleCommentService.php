<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/9/15
 * Time: 15:29
 */
namespace App\Services;
use Illuminate\Support\Facades\Cache;   //引入默认redis缓存
use App\Repositories\ArticleCommentRepository;
/**
 * 处理业务逻辑
 */
class ArticleCommentService extends BaseService
{
    private $articleRepository;

    public function __construct(ArticleCommentRepository $articlecommentRepository)
    {
        $this->articlecommentRepository = $articlecommentRepository;
        $this->baseRepository = $this->articlecommentRepository;
    }

    /**
     * 文章点赞
     *
     * @access public
     * @param mixed $article_id 接收C发送的数据
     * @since 2017/9/15 SF
     * @return string
     */
    public function liked($article_id){
        $member_id = Cache::get('member_id');
        if($member_id){
            $this->user_id = $member_id;
            $this->article_id = $article_id;
            $this->type = '1';
            $this->star = '1';
            return $this->articlecommentRepository->isLiked($this);
        }
    }

    /**
     * 文章评论
     *
     * @access public
     * @param mixed 接收C发送的数据
     * @need 查询parent_id是否是评论文章
     * @since 2017/9/18 SF
     * @return json
     */
    public function comment($input){
        if($input['parent_id']){
            // 检查是否存在
            $res = $this->articlecommentRepository->getByCommentId($input['parent_id']);
            if(!isset($res)){return false;}
        }
        $member_id = Cache::get('member_id');
        $data = array(
            'user_id' => $member_id,
            'parent_id' => isset($input['parent_id']) ? $input['parent_id'] : '0',
            'article_id' => $input['article_id'],
            'comment' => $input['comment'],
            'type' => '2'
        );
        return $this->articlecommentRepository->create($data);
    }


}