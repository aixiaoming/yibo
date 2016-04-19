<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title>艺博后台管理系统</title>
    <link href="<?php echo (CSS_URL); ?>pcindex.css" rel="stylesheet" type="text/css">
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
</head>


<body>


<div class="header">
    <div class="dl-log">
        欢迎您，<span class="dl-log-user">admin</span>
        <a href="/yibo/index.php/Home/Index/loginout"  title="退出系统" class="dl-log-quit">[退出]</a>

    </div>
</div>

<div class="dl-main-nav">
    <div class="dl-inform">
        <div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div>
    </div>
    <ul id="J_Nav" class="nav-list ks-clear">
        <li class="nav-item dl-selected">
            <div class="nav-item-inner nav-home">系统管理</div>
            <div class="nav-item-mask"></div>
        </li>
    </ul>
</div>

<div class="ul" id="divid">
    <ul>
        <li  class="active"><a href="/yibo/index.php/Home/Pc/index" style="color: #fff;">日报表</a></li>
        <li><a href="/yibo/index.php/Home/Pc/qitain">最近七天</a></li>
        <li><a href="/yibo/index.php/Home/Pc/mac">机器报表</a></li>
        <li><a href="/yibo/index.php/Home/Pc/month">月报表</a></li>
        <li><a href="/yibo/index.php/Home/Pc/user">客户报表</a></li>
        <li><a href="/yibo/index.php/Home/Pc/admin">成员管理</a></li>
    </ul>
</div>

<div id="righti">


<form method="post" action="/yibo/index.php/Home/Pc" style="float: left;">
    <div class='input-group date' id='datetimepicker1' style="width: 300px;float: left">
        <input type='text' class="form-control" name="time"  value="<?php echo ($time); ?>"/>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    <button class="btn btn-success" type="submit" style="margin-left:20px;margin-top: 5px;width: 100px;">提交</button>
</form>


    <form method="post" action="<?php echo U('Excle/excle');?>">
            <input type='hidden' class="form-control" name="time"  value="<?php echo ($time); ?>"/>
            <button class="btn btn-info" type="submit" style="float: right;margin-top: 20px;margin-right: 30px;">导出为excle</button>
    </form>


    <table class="table table-bordered"  id="table">
        <thead>
        <tr>
            <th>客户名称</th>
            <th>签到时间</th>
            <th>机器编号</th>
            <th>座位编号</th>
            <th>入金金额</th>
            <th>入金方式</th>
            <th>主管姓名</th>
            <th>出金金额</th>
            <th>赠分总数</th>
            <th>优惠总数</th>
            <th>扣优惠</th>
            <th>返现</th>
            <th>操作人</th>
            <th>审核主管</th>
            <th>实际收入</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($conuser)): $i = 0; $__LIST__ = $conuser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <th><?php echo ($vo["conname"]); ?></th>
                <th><?php echo ($vo["time"]); ?></th>
                <th><?php echo ($vo["mac"]); ?></th>
                <th><?php echo ($vo["conpos"]); ?></th>
                <th><?php echo ($vo["put"]); ?></th>
                <th><?php echo ($vo["type"]); ?></th>
                <th><?php echo ($vo["account"]); ?></th>
                <th><?php echo ($vo["out1"]); ?></th>
                <th><?php echo ($vo["give"]); ?></th>
                <th><?php echo ($vo["turn"]); ?></th>
                <th><?php echo ($vo["coturn"]); ?></th>
                <th><?php echo ($vo["out2"]); ?></th>
                <th><?php echo ($vo["wainame"]); ?></th>
                <th><?php echo ($vo["bossname"]); ?></th>
                <th><?php $zong=$vo["put"]-$vo["out1"]-$vo["give"]-$vo["turn"]+$vo["coturn"]-$vo["out2"]; echo ($zong); ?></th>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
        <tfoot>
            <th>总计</th>
            <th>- -</th>
            <th>- -</th>
            <th>- -</th>
            <th><?php echo ($sum["put"]); ?></th>
            <th>- -</th>
            <th>- -</th>
            <th><?php echo ($sum["out"]); ?></th>
            <th><?php echo ($sum["give"]); ?></th>
            <th><?php echo ($sum["turn"]); ?></th>
            <th><?php echo ($sum["coturn"]); ?></th>
            <th><?php echo ($sum["out2"]); ?></th>
            <th>- -</th>
            <th>- -</th>
            <th><?php $zong=$sum["put"]-$sum["out"]-$sum["give"]-$sum["turn"]+$sum["coturn"]-$sum["out2"]; echo ($zong); ?></th>
        </tfoot>
    </table>
</div>
<!--<li><a href="<?php echo U('Admin/Payments/index');?>" >支付管理</a></li>-->

</body>
</html>
<script>
    function getInfo() {
        var s3 = $(window).height() - 71; //浏览器时下窗口可视区域高度
        var s5 = $(window).height() - 79;
        var s4 = $(window).width() - 160;
        document.getElementById("divid").style.height = s3 + 'px';
        document.getElementById("righti").style.width = s4 + 'px';
        document.getElementById("righti").style.height = s5 + 'px';

    }
    getInfo();
    window.onresize = function(){
        getInfo();
    };
</script>