<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<!--暂时无用-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息填写</title>
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




<form class="form-horizontal" style="margin-top:20px;">
    <input type="hidden" value="<?php echo ($conrecord["id"]); ?>" id="conid">
    <div class="input-group">
        <span class="input-group-addon">姓　　名</span>
        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo ($conuser['name']); ?>" id="name" disabled>
        <span class="input-group-addon" class="btn btn-info"><a href="/kaili/index.php/Home/Index/waiter" class="btn btn-info" style="height:26px;line-height:12px;font-size:12px;">切换客户</a></span>
    </div>
    <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">机器编号</span>
            <input type="text" class="form-control" value="<?php echo ($conrecord["mac"]); ?>" aria-describedby="basic-addon1" id="input2" disabled>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">座位编号</span>
            <input type="text" class="form-control" value="<?php echo ($conrecord["conpos"]); ?>" aria-describedby="basic-addon1" id="input3" disabled>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">入　　分</span>
        <input type="text" class="form-control" value="<?php echo ($conrecord["put"]); ?>" aria-describedby="basic-addon1" id="input4" disabled>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">入分方式</span>
        <input type="text" class="form-control" value="<?php echo ($conrecord["type"]); ?>" aria-describedby="basic-addon1" id="input9" disabled>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">主管姓名</span>
        <input type="text" class="form-control" value="<?php echo ($conrecord["account"]); ?>" aria-describedby="basic-addon1" id="input10" disabled>
    </div>

    <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">赠　　分</span>
    <input type="text" class="form-control" placeholder="赠分" aria-describedby="basic-addon1" id="input6">
    </div>
    <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">优　　惠</span>
    <input type="text" class="form-control" placeholder="优惠" aria-describedby="basic-addon1"  id="input7">
    </div>
    <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">扣　优惠</span>
    <input type="text" class="form-control" placeholder="扣优惠" aria-describedby="basic-addon1"  id="input8">
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">出　　分</span>
        <input type="text" class="form-control" placeholder="出分" aria-describedby="basic-addon1" id="input5">
    </div>
    <a type="submit" class="btn btn-info" id="btn_login" style="margin-top: 20px;margin-bottom: 20px;">提　　　　交</a>
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
        var a = $('#input2').val();
        var b = $('#input3').val();
        var c = $('#input4').val();
        var d = $('#input5').val();
        var e = $('#input6').val();
        var f = $('#input7').val();
        var g = $('#input8').val();
        var h = $('#input9').val();
        var j = $('#input10').val();
        var i = $('#conid').val();
        var k = $('#name').val();
        $.ajax({
            url: '/kaili/index.php/Home/Index/conout',
            type: "post",
            data:{
                'mac':a,
                'conpos':b,
                'put':c,
                'type':h,
                'account':j,
                'out':d,
                'give':e,
                'turn':f,
                'coturn':g,
                'conid':i,
                'name':k
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