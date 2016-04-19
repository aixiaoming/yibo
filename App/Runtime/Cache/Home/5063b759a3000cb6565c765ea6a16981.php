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
        <li><a href="/yibo/index.php/Home/Pc/index">日报表</a></li>
        <li><a href="/yibo/index.php/Home/Pc/qitain">最近七天</a></li>
        <li><a href="/yibo/index.php/Home/Pc/mac">机器报表</a></li>
        <li><a href="/yibo/index.php/Home/Pc/month">月报表</a></li>
        <li><a href="/yibo/index.php/Home/Pc/user">客户报表</a></li>
        <li class="active"><a href="/yibo/index.php/Home/Pc/admin"  style="color: #fff;">成员管理</a></li>
    </ul>
</div>

<div id="righti">

    <div class="left" style="width: 49%;float: left;border-right: 1px dashed #ccc;">
        <div style="width: 96%;float: left">
            <div style="margin-top: 30px;">
                <h3>管理人员列表</h3><br>
                <button class="btn btn-success" id="boss">新增主管</button>
                <button class="btn btn-info" id="waiter">新增服务员</button>
            </div>
            <table class="table table-bordered"  id="table">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>账号</th>
                    <th>职务</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($user0)): $i = 0; $__LIST__ = $user0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <th><?php echo ($vo["name"]); ?></th>
                        <th><?php echo ($vo["login"]); ?></th>
                        <th>管理员</th>
                        <th><a href="/yibo/index.php/Home/Pc/update?id=<?php echo ($vo["id"]); ?>">修改密码</a></th>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php if(is_array($user1)): $i = 0; $__LIST__ = $user1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <th><?php echo ($vo["name"]); ?></th>
                        <th><?php echo ($vo["login"]); ?></th>
                        <th>主管</th>
                        <th><a  href="/yibo/index.php/Home/Pc/update?id=<?php echo ($vo["id"]); ?>">修改密码</a></th>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php if(is_array($user2)): $i = 0; $__LIST__ = $user2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <th><?php echo ($vo["name"]); ?></th>
                        <th><?php echo ($vo["login"]); ?></th>
                        <th>服务员</th>
                        <th><a  href="/yibo/index.php/Home/Pc/update?id=<?php echo ($vo["id"]); ?>">修改密码</a></th>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="right" style="width: 48%;float: right">
        <div style="width: 100%;">
            <div style="margin-top: 30px;">
                <h3>客户列表</h3><br>
            </div>
            <table class="table table-bordered" style="margin-top:0px!important;"  id="table">
                <thead>
                <tr>
                    <th>账号</th>
                    <th>姓名</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($user3)): $i = 0; $__LIST__ = $user3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <th><?php echo ($vo["userphone"]); ?></th>
                        <th><?php echo ($vo["name"]); ?></th>
                        <th style="padding:5px;padding-left: 10px;">
                            <form method="post" action="/yibo/index.php/Home/Pc/user" style="margin: 0px!important;">
                                    <input type='hidden' class="form-control" name="login" value="<?php echo ($vo["userphone"]); ?>"/>
                            <button type="submit" class="btn btn-info" style="background-color: clearColor;height: 25px;;padding: 0px;border-radius: 2px;font-size: 12px;padding-left: 10px;padding-right: 10px;" id="button">消费记录</button>
                            </form>
                        </th>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>


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
    $('#boss').on('click', function(){
        layer.open({
            type: 2,
            title: '新增主管',
            area: ['360px', '500px'],
            content: ['/yibo/index.php/Home/Pc/addboss.html', 'no']
        });
    });
    $('#waiter').on('click', function(){
        layer.open({
            type: 2,
            title: '新增服务员',
            area: ['360px', '500px'],
            content: ['/yibo/index.php/Home/Pc/addwaiter.html', 'no']
        });
    });

</script>