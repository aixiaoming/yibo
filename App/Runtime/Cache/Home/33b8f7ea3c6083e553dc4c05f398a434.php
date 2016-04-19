<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>权限设置</title>
    <style>
        .check{width: 40%!important;float: left;padding-left: 30px;margin-top: 20px;text-align:center;}
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



<form method="post" action="/yibo/index.php/Home/Boss/rolesubmit" enctype="multipart/form-data">
    <h4 style="margin-left:30px;"><?php echo ($waiter1["name"]); ?>权限设置</h4>
    <h6 style="margin-left:30px;">目前可以操作的机器:<?php echo ($waiter); ?></h6>
    <input type="hidden" value="<?php echo ($waiterid["id"]); ?>" name="waiterid">

        <?php if(is_array($conmac)): $i = 0; $__LIST__ = $conmac;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><div  class="check">
            <label class="radio-inline">
                <input  type="checkbox"  value="<?php echo ($vo1["id"]); ?>" name="mac[]"> <?php echo ($vo1["mac"]); ?>
            </label>
            </div><?php endforeach; endif; else: echo "" ;endif; ?><br>
    <!--<?php $id=$vo1["id"];if(in_array("$id", $waiter)){echo "checked";} ?>-->
    <input type="submit" class="btn btn-info" value="提　　　交" style="width: 80%;margin-top: 30px;margin-left: 10%;">
</form>

</body>
</html>