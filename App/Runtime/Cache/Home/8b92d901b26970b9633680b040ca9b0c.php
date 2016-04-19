<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>选择用户需求</title>
    <script>
        function disp_alert() {
            alert("该顾客已入分，请先出分。")
        }
        function disp1_alert() {
            alert("该顾客还没有入分。")
        }
    </script>
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
    <a href="/kaili/index.php/Home/Index/loginout" style="float: right;line-height: 40px;margin-right: 2%;font-size: 400;color: #fff;">退出</a>
</header>




<div style="width: 80%;margin-left: 10%;margin-top: 80px;text-align: center;background-color: #fff;padding-top: 30px;padding-bottom: 30px;">

<label>客户姓名:</label><label><?php echo ($consur["name"]); ?></label>　　<a href="<?php echo (YE_URL); ?>Index/waiter.html">切换用户</a><br>

<?php if(($put == '')): ?><a href="<?php echo (YE_URL); ?>/Index/conadd.html"><button type="button" class="btn btn-success" style="width: 60%;margin-top: 30px;">入分</button></a><br>
    <a href="#"  onclick="disp1_alert()"><button type="button" class="btn btn-info" style="width: 60%;margin-top: 30px;">出/赠/返/扣优惠</button></a><br>
    <a href="/kaili/index.php/Home/Index/bosssee"><button type="button" class="btn btn-success" style="width: 60%;margin-top: 30px;">主管意见</button></a><br>
    <?php else: ?>
    <a href="#"  onclick="disp_alert()"><button type="button" class="btn btn-success" style="width: 60%;margin-top: 30px;">入分</button></a><br>
    <a href="<?php echo (YE_URL); ?>/Index/conout.html"><button type="button" class="btn btn-info" style="width: 60%;margin-top: 30px;">出/赠/返/扣优惠</button></a><br>
    <a href="/kaili/index.php/Home/Index/bosssee"><button type="button" class="btn btn-success" style="width: 60%;margin-top: 30px;">主管意见</button></a><br><?php endif; ?>

</div>


</body>
</html>