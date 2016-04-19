<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="zh-CN">
<title>跳转提示</title>
<style type="text/css">
    body {text-align:center;font-family:宋体,serif;background:#ffffff!important;font-size:12px;width: 100%;}
    .logo{float:left;}
    .clearfix{width: 80%;background-color: #fff;box-shadow: rgb(144, 144, 144) 2px 2px 5px 2px;border-radius: 4px;margin: auto;margin-top: 50px;}
    h3{margin-top:0px!important; }
    h4{margin-top: 20px!important;margin-bottom: 30px!important;}
</style>
</head>
<body>
<head>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="<?php echo (JS_URL); ?>jquery-2.1.1.min.js"></script>
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo (CSS_URL); ?>common.css" rel="stylesheet" type="text/css">
    <link href="<?php echo (CSS_URL); ?>bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
    <script src="<?php echo (JS_URL); ?>bootstrap-datetimepicker.js"></script>
    <script src="<?php echo (JS_URL); ?>jquery-1.8.2.min.js" ></script>
    <script src="<?php echo (JS_URL); ?>jquery.min.js"></script>
    <script src="<?php echo (JS_URL); ?>jquery.form.js"></script>
    <script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
    <script src="<?php echo (JS_URL); ?>layer/layer.js"></script>
</head>
<header>
    <span class="logo">艺博</span>
    <a href="/yibo/index.php/Home/Index/loginout" style="float: right;line-height: 40px;margin-right: 2%;font-size: 400;color: #fff;">退出</a>
</header>


<div class="area clearfix">
     <?php if(isset($message)) {?>
   <img src="/yibo/App/Public/Img/success.png"  width="160" height="160" class="tips">
              <h3><?php echo($message); ?></h3>
    <?php }else{?>
   <img src="/yibo/App/Public/Img/error.png"  width="160" height="160" class="tips">
             <h3><?php echo($error); ?></h3>
    <?php }?>

    <h4>页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b></h4>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>