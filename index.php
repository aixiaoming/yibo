<?php
// 应用入口文件


header("content-type:text/html;charset=utf-8");
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
//define('APP_DEBUG',True);


// 定义应用目录
define('APP_PATH','./App/');

//定义css js 常量
//define("SITE_URL","http://localhost/");
define("CSS_URL","/yibo/App/public/Css/"); //css
define("IMG_URL","/yibo/App/public/Img/"); //img
define("JS_URL","/yibo/App/public/Js/"); //js
define("YE_URL","/yibo/index.php/Home/");//页面URL

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单