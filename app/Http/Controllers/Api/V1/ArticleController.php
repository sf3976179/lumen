<?php
namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;   //引入默认redis缓存
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class ArticleController extends BaseController
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * 文章分类增加
     *
     * @access public
     * @param mixed $request post发送过来的文章数据
     * @since 2017/9/12 SF
     * @return json
     */
    public function articleAdd(Request $request)
    {
        if($request->input()){
            $result = $this->articleService->articleInsert($request->input());
            return $this->_outdata($result);
        }else{
            return $this->_outdata(null,'请输入正确信息');
        }
    }

    /**
     * 文章分类列表
     *
     * @access public
     * @param mixed $request get发送过来的父级id（当0为查找所有一级分类）
     * @since 2017/9/13 SF
     * @return json
     */
     public function articleList($id){
         $result = $this->articleService->articleList($id);
         return $this->_outdata($result);
     }

    public function articleList1($id){
        $result = $this->articleService->articleList($id);
        return $this->_outdata($result);
    }

    /**
     * 图片上传
     *
     * @access public
     * @param mixed $request post发送过来的数据
     * @since 2017/9/13 SF
     * @return json
     */
     public function fileUpload(Request $request){
         $file = $request->file('file_picture');
         //判断文件是否上传成功
         if($file->isValid()){
             $originalName  = $file->getClientOriginalName(); // 文件名称
             $ext = $file->getClientOriginalExtension(); // 文件格式
             $realPath  = $file->getRealPath();   //临时文件的绝对路径
             $type = $file->getClientMimeType();     // image/jpeg（类型）

             $file_type = array('psd','png','swf','jpg','jpeg');
             if(in_array($ext,$file_type)){
                 $filename = date("YmdHis").uniqid().'.'.$ext;
                 $this->path = config('upload.public.root').'/'.date('Ymd'); //存放文件路径
                 if($file->move($this->path,$filename)){
                     return $this->_outdata($filename);
                 }
             }
         }else{
             return $this->_outdata(null,'请重新上传');
         }
     }

    /**
     * 文章内容增加
     *
     * @access public
     * @param mixed $request post发送过来的数据
     * @since 2017/9/14 SF
     * @return json
     */
    public function articleContentAdd(Request $request){
       //2017091407235259ba2e8852211.png 图片名称
        if($request->input()){
            $res = $this->articleService->articleContentAdd($request->input());
            if($res){
                return $this->_outdata($res);
            }
        }else{
            return $this->_outdata(null,'请传递正确数据');
        }
    }

    /**
     * 文章评论
     *
     * @access public
     * @param mixed post发送过来的数据
     * @since 2017/9/15 SF
     * @return json
     */







}