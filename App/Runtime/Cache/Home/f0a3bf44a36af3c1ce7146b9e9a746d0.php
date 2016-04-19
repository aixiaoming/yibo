<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>艺博后台管理系统</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="<?php echo (JS_URL); ?>jquery-2.1.1.min.js"></script>
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo (CSS_URL); ?>common.css" rel="stylesheet" type="text/css">
    <link href="<?php echo (CSS_URL); ?>bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
    <script src="<?php echo (JS_URL); ?>jquery-1.8.2.min.js" ></script>
    <script src="<?php echo (JS_URL); ?>jquery.min.js"></script>
    <script src="<?php echo (JS_URL); ?>jquery.form.js"></script>
    <script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
    <script src="<?php echo (JS_URL); ?>layer/layer.js"></script>
    <script src="<?php echo (JS_URL); ?>moment-with-locales.js"></script>
    <script src="<?php echo (JS_URL); ?>bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        });
    </script>
    <style>

    </style>
</head>
<body>

<header>
    <span class="logo">艺博</span>
    <a href="/yibo/index.php/Home/Index/loginout" style="float: right;line-height: 40px;margin-right: 2%;font-size: 400;color: #fff;">退出</a>
</header>



<div class="conselect">
    <a href="/yibo/index.php/Home/Boss/index"><div class="a">审核申请</div></a>
    <a href="/yibo/index.php/Home/Boss/record"><div class="a"  id="active">查看记录</div></a>
    <a href="/yibo/index.php/Home/Boss/roleindex"><div class="a">权限设置</div></a>
</div>


<div class="bosscon">

    <a class="btn btn-info" href="/yibo/index.php/Home/Boss/record" style="position: fixed;top: 60%;right: 0%;width: 50px;height:50px;text-align: center;line-height: 50px;border-radius: 50%;float: right!important;font-size: 12px;padding: 0px;">切换客户</a>

    <form method="post" action="/yibo/index.php/Home/Boss/per" style="margin-top: 20px;">
        <input type="hidden" name="conid" value="<?php echo ($conid); ?>">
        <div class='input-group date' id='datetimepicker1' style="width: 80%;margin-left: 10%;">
            <input type='text' class="form-control" name="time" value="<?php echo ($time); ?>"/>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
        <button class="btn btn-success" type="submit" style="margin-left:10%;width: 80%;height: 40px;margin-top: 20px;">提交</button>
    </form><br>



    <table class="table table-bordered" style="width: 80%;margin-left: 10%;background-color: #fff;">
       <tr>
           <th>客户名称</th>
           <th><?php echo ($user["name"]); ?></th>
       </tr>
        <tr>
            <th>入分总数</th>
            <th><?php echo ($sum["put"]); ?></th>
        </tr>
        <tr>
            <th>出分总数</th>
            <th><?php echo ($sum["out"]); ?></th>
        </tr>
        <tr>
            <th>赠分总数</th>
            <th><?php echo ($sum["give"]); ?></th>
        </tr>
        <tr>
            <th>优惠总数</th>
            <th><?php echo ($sum["turn"]); ?></th>
        </tr>
        <tr>
            <th>扣优惠总数</th>
            <th><?php echo ($sum["coturn"]); ?></th>
        </tr>
        <tr>
            <th>返现总数</th>
            <th><?php echo ($sum["out2"]); ?></th>
        </tr>
        <tr>
            <th>实际收入</th>
            <th><?php $zong=$sum["put"]-$sum["out"]-$sum["give"]-$sum["turn"]+$sum["coturn"]-$sum["out2"]; echo ($zong); ?></th>
        </tr>
    </table>


    <?php if(is_array($conuser)): $i = 0; $__LIST__ = $conuser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table class="table table-condensed" style="width: 80%;margin-left: 10%;background-color: #fff;">

            <tr>
                <th>客户名称</th>
                <th><?php echo ($vo["conname"]); ?></th>
            </tr>
            <tr>
                <th>签到时间</th>
                <th><?php echo ($vo["time"]); ?></th>
            </tr>
            <tr>
                <th>机器编号</th>
                <th><?php echo ($vo["mac"]); ?></th>
            </tr>
            <tr>
                <th>座位编号</th>
                <th><?php echo ($vo["conpos"]); ?></th>
            </tr>
            <tr>
                <th>入　　金</th>
                <th><?php echo ($vo["put"]); ?></th>
            </tr>
            <tr>
                <th>入金方式</th>
                <th><?php echo ($vo["type"]); ?></th>
            </tr>
            <tr>
                <th>出　　金</th>
                <th><?php echo ($vo["out1"]); ?></th>
            </tr>
            <tr>
                <th>赠　　分</th>
                <th><?php echo ($vo["give"]); ?></th>
            </tr>
            <tr>
                <th>优　　惠</th>
                <th><?php echo ($vo["turn"]); ?></th>
            </tr>
            <tr>
                <th>扣　优惠</th>
                <th><?php echo ($vo["coturn"]); ?></th>
            </tr>
            <tr>
                <th>返　　现</th>
                <th><?php echo ($vo["out2"]); ?></th>
            </tr>
            <tr>
                <th>合计总数</th>
                <th><?php $zong=$vo["put"]-$vo["out1"]+$vo["give"]+$vo["turn"]-$vo["coturn"]; echo ($zong); ?></th>
            </tr>
            <tr>
                <th>实际收入</th>
                <th><?php $zong=$vo["put"]-$vo["out1"]; echo ($zong); ?></th>
            </tr>
        </table><?php endforeach; endif; else: echo "" ;endif; ?>
</div>







</body>
</html>