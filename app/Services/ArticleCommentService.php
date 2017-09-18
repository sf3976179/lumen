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
//            $article_comment = array(
//                'user_id'=>$member_id,
//                'article_id'=>$article_id,
//                'type'=>'1',
//                'star'=>'1'
//            );

            $this->articlecommentRepository->isLiked($this);
        }
    }


}