<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>服务员列表</title>
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



<div class="conselect">
    <a href="/yibo/index.php/Home/Boss/index"><div class="a">审核申请<?php echo ($count); ?></div></a>
    <a href="/yibo/index.php/Home/Boss/record"><div class="a">查看记录</div></a>
    <a href="/yibo/index.php/Home/Boss/roleindex"><div class="a"  id="active">权限设置</div></a>
</div>

    <?php if(is_array($waiter)): $i = 0; $__LIST__ = $waiter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form method="post" action="/yibo/index.php/Home/Boss/role">
            <input type="hidden" value="<?php echo ($vo["id"]); ?>" name="id">
            <button type="submit" class="btn btn-info" id="waiterrole" style="width: 40%;float: left;border: none;"><?php echo ($vo["name"]); ?><br></button>
        </form><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>