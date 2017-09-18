<?php

return [

        // 本地端的local空间
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        // 本地端的public空间
        'public' => [
            'driver' => 'local',
            'root' => base_path('public\upload'),
//            'visibility' => 'public',
        ],

        // 新建一个本地端uploads空间（目录） 用于存储上传的文件
        'uploads' => [

            'driver' => 'local',

            // 文件将上传到storage/app/uploads目录
            'root' => storage_path('app'),


            // 文件将上传到public/uploads目录 如果需要浏览器直接访问 请设置成这个
            //'root' => public_path('uploads'),
        ],


];
