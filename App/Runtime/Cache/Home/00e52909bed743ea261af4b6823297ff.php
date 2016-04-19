<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>艺博</title>
    <link href="<?php echo (CSS_URL); ?>index.css" rel="stylesheet" type="text/css">
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
</header>

<form class="form-horizontal" style="margin-top: 80px;">
    <input type="text" class="form-control" id="inputEmail3" placeholder="账号" name="login">
    <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="password">
    <a class="btn btn-info" id="btn_login">登　　　　　录</a>
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
           layer.msg('请输入用户名', function () {
           });
           return false;
       }
       if (p == "") {
           layer.msg('请输入密码', function () {
           });
           return false;
       }
       $.ajax({
           url: '/yibo/index.php/Home/Index/login',
           type: "post",
           data:{
               'login':u,
               'password':p
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