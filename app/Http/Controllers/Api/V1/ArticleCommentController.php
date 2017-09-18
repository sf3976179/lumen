<?php
namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Services\ArticleCommentService;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Cache;   //引入默认redis缓存
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class ArticleCommentController extends BaseController
{
    protected $articlecommentService;

    public function __construct(ArticleCommentService $articlecommentService)
    {
        $this->articlecommentService = $articlecommentService;
    }

    /**
     * 文章点赞
     *
     * @access public
     * @param mixed get发送过来的数据
     * @since 2017/9/14 SF
     * @return json
     */
    public function articleLiked($article_id){
        $this->articlecommentService->liked($article_id);
    }






}