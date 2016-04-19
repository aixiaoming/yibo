<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>艺博</title>
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
    <a href="/yibo/index.php/Home/Boss/index"><div class="a" id="active">审核申请</div></a>
    <a href="/yibo/index.php/Home/Boss/record"><div class="a">查看记录</div></a>
    <a href="/yibo/index.php/Home/Boss/roleindex"><div class="a">权限设置</div></a>
</div>


<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">客户姓名</span>
            <input type="text" class="form-control" value="<?php echo ($vo["conname"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">机器编号</span>
            <input type="text" class="form-control" value="<?php echo ($vo["mac"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">座位编号</span>
            <input type="text" class="form-control" value="<?php echo ($vo["conpos"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">入　　分</span>
            <input type="text" class="form-control" value="<?php echo ($vo["put"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">入分方式</span>
            <input type="text" class="form-control" value="<?php echo ($vo["type"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">主管姓名</span>
            <input type="text" class="form-control" value="<?php echo ($vo["account"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">出　　分</span>
            <input type="text" class="form-control" value="<?php echo ($vo["out1"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">赠　　分</span>
            <input type="text" class="form-control" value="<?php echo ($vo["give"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">优　　惠</span>
            <input type="text" class="form-control" value="<?php echo ($vo["turn"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">扣 优 惠</span>
            <input type="text" class="form-control" value="<?php echo ($vo["coturn"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">返　　现</span>
            <input type="text" class="form-control" value="<?php echo ($vo["out2"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">服 务 员</span>
            <input type="text" class="form-control" value="<?php echo ($vo["wainame"]); ?>" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group" style="width: 100%;">
            <span class="input-group-addon">
                <form action="/yibo/index.php/Home/Boss/disagree" method="post">
                    <input type="hidden" name="give" value="<?php echo ($vo["give"]); ?>">
                    <input type="hidden" name="turn" value="<?php echo ($vo["turn"]); ?>">
                    <input type="hidden" name="coturn" value="<?php echo ($vo["coturn"]); ?>">
                    <input type="hidden" name="out2" value="<?php echo ($vo["out2"]); ?>">
                    <input type="hidden" value="<?php echo ($vo["id"]); ?>" name="id">
                    <button class="btn btn-danger" style="width: 90%;" type="submit">不 同 意</button>
                </form>
            </span>
            <span class="input-group-addon">
                <form action="/yibo/index.php/Home/Boss/agree" method="post">
                    <input type="hidden" value="<?php echo ($vo["id"]); ?>" name="id">
                    <button class="btn btn-success" style="width: 90%;" type="submit">同　意</button>
                </form>
            </span>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>


<!--/yibo/index.php/Home/Boss/agree-->

<div class="page">
    <?php echo ($page); ?>
</div>


</body>
</html>