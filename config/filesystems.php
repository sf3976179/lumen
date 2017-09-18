<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. A "local" driver, as well as a variety of cloud
    | based drivers are available for your choosing. Just store away!
    |
    | Supported: "local", "ftp", "s3", "rackspace"
    |
    */

    // 默认使用本地端空间 支持 "local", "ftp", "s3", "rackspace"
    'default' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    // 云存储使用 Amazon S3
    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    */

    'disks' => [

        // 本地端的local空间
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        // 本地端的public空间
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'visibility' => 'public',
        ],

        // 新建一个本地端uploads空间（目录） 用于存储上传的文件
        'uploads' => [

            'driver' => 'local',

            // 文件将上传到storage/app/uploads目录
            'root' => storage_path('app/uploads'),

            // 文件将上传到public/uploads目录 如果需要浏览器直接访问 请设置成这个
            //'root' => public_path('uploads'),
        ],

        // Amazon S3 相关配置
        's3' => [
            'driver' => 's3',
            'key' => 'your-key',
            'secret' => 'your-secret',
            'region' => 'your-region',
            'bucket' => 'your-bucket',
        ],

    ],

];
