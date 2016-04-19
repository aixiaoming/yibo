<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>客户注册</title>
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
    <a href="/yibo/index.php/Home/Index/waiter"><div class="a">老客户登录</div></a>
    <a href="#"><div class="a"  id="active">新客户注册</div></a>
    <a href="/yibo/index.php/Home/Index/bosssee"><div class="a">主管意见</div></a>
</div>

<form class="form-horizontal" style="margin-top:80px;">
    <input type="text" class="form-control" id="inputEmail3" placeholder="手机号" name="userphone">
    <input type="text" class="form-control" id="inputPassword3" placeholder="姓名" name="name">
    <a type="submit" class="btn btn-info" id="btn_login">注　　　　册</a>
</form>

</body>

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
        if (u == "") {
            layer.msg('请输入手机号', function () {
            });
            return false;
        }
        if (p == "") {
            layer.msg('请输入姓名', function () {
            });
            return false;
        }
        $.ajax({
            url: '/yibo/index.php/Home/Index/conreg',
            type: "post",
            data:{
                'userphone':u,
                'name':p
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

</html>