<?php
/**
 * 自定义方法
 * Created by SF.
 * User: SF
 * Date: 2017/9/27
 * Time: 10:23
 */

if (! function_exists('getData')) {
    /**
     * 保留 array1 中 key 等于 $array2 的 value 的元素
     *
     * @param array $data
     * @param array $keys
     *
     * @return array
     */
    function getData($data = null)
    {
        return '123456';
    }

    //SQL计算时间方法
    function getmicrotime(){
        list($usec, $sec) = explode(" ",microtime());
        return ((float)$usec + (float)$sec);
    }
}