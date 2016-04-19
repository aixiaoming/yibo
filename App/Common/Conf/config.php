<?php
return array(
    //url模式设置
    //'URL_MODEL' =>  0,
    'URL_MODEL'             =>  1,

//    让页面显示追踪日志信息
//    'SHOW_PAGE_TRACE'   => true,

    //url地址大小写不敏感设置
    'URL_CASE_INSENSITIVE'  =>  false,
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'yibo', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '818903ai',  // 密码
    'DB_PORT'   => '3306', // 端口

    //模版设置相关
    'TMPL_ACTION_SUCCESS'   => '/Public/dispatch_jump',
    'TMPL_ACTION_ERROR'     => '/Public/dispatch_jump',
);