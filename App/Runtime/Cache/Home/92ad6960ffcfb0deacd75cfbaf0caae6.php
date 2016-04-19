<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>客户登录</title>
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
    <a href="#"><div class="a" id="active">老客户登录</div></a>
    <a href="/yibo/index.php/Home/Index/reg"><div class="a">新客户注册</div></a>
    <a href="/yibo/index.php/Home/Index/bosssee"><div class="a">主管意见</div></a>
</div>




<form class="form-horizontal">
    <input type="text" class="form-control" id="inputEmail3" placeholder="账号" name="userphone">
    <a type="submit" class="btn btn-info" id="btn_login">客户登录</a>
</form>

<ol type=1 style="margin-top: 10px;">
    <?php if(is_array($conuser)): $i = 0; $__LIST__ = $conuser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="width: 50%;float: left;">
            <form class="form-horizontal" method="post" action="/yibo/index.php/Home/Index/conlogin2">
                <input type="hidden" class="form-control"  name="userphone" value="<?php echo ($vo["name"]); ?>">
                <button type="submit" class="btn btn-info" id="bt_login" style="width: 60%;" ><?php echo ($vo["name"]); ?></button>
            </form>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ol>

<!--style="width: 40%;float: left;margin-left: 5%;margin-right: 5%;margin-top: 10px;" class="btn btn-primary"-->
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
        if (u == "") {
            layer.msg('请输入客户账号', function () {
            });
            return false;
        }
        $.ajax({
            url: '/yibo/index.php/Home/Index/conlogin',
            type: "post",
            data:{
                'userphone':u
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