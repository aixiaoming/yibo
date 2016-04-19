<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title>艺博后台管理系统</title>
    <link href="<?php echo (CSS_URL); ?>pcindex.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo (JS_URL); ?>jquery-2.1.1.min.js"></script>
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" type="text/css">
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
    <h3>修改密码</h3>

    <form class="form-horizontal" style="width: 500px;float:left;">
        <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">账号</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="账号" disabled value="<?php echo ($conuser["login"]); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmai3" class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmai3" placeholder="姓名" disabled value="<?php echo ($conuser["name"]); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">新密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputEmail3" placeholder="新密码">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="确认密码">
                <input type="hidden" value="<?php echo ($conuser["id"]); ?>" id="id">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-info" id="btn_login">提　　　交</a>
            </div>
        </div>
    </form>

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

<script>
    $(function(){
        $('#btn_login').click(function(){login()});
        $(document).keypress(function(e) {
            if(e.which == 13) {
                login();
            }
        });
    });

    function login() {

        var u = $('#inputEmail3').val();
        var p = $('#inputPassword3').val();
        var i = $('#id').val();
        if (u == "") {
            layer.msg('请输入新密码', function () {
            });
            return false;
        }
        if (p == "") {
            layer.msg('请再次输入密码', function () {
            });
            return false;
        }
        if(u!=p){
            layer.msg('两次密码不相等', function () {
            });
            return false;
        }
        $.ajax({
            url: '/yibo/index.php/Home/Pc/update',
            type: "post",
            data:{
                'password2':u,
                'id':i,
                'password1':p
            },
            dataType:'json',
            error:function(){

                layer.msg('网络连接失败，请刷新页面重试',function(){})

            },
            success:function(data){

                if(data.error==0){

                    location.href=data.url;

                }else{
                    layer.msg(data.msg)
                }
            }
        });
    }
</script>