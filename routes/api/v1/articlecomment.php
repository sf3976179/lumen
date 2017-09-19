<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/9/18
 * Time: 11:35
 */
$api->group(['middleware' => 'authToken'],function($api){
    $api->get('articleLiked/{article_id}',['as'=>'articlecomment.liked','uses' => 'ArticleCommentController@articleLiked']); //文章点赞
    $api->post('articleComment',['as'=>'articlecomment.comment','uses'=>'ArticleCommentController@comment']); //文章评论
});