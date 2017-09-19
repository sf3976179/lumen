<?php
$api->group(['middleware' => 'authToken'],function($api){
    $api->post('article/insert', ['as' => 'article.add', 'uses' => 'ArticleController@articleAdd']); //文章分类录入
    $api->get('article_list/{id}',['as'=>'article.list','uses' => 'ArticleController@articleList']); //文章列表
    $api->post('file_upload',['as'=>'article.upload','uses' => 'ArticleController@fileUpload']); //图片上传
    $api->post('article_content/add',['as' => 'article_content.add' , 'uses' => 'ArticleController@articleContentAdd']); //文章内容增加
});