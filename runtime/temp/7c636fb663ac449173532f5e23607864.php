<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"G:\WWW_GIT\yigui\public/../application/admin\view\manager\login.html";i:1569411795;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link href="/static/admin/hui/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/static/admin/hui/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/static/admin/hui/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/admin/hui/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script><![endif]-->
<title>后台登录 - 衣柜</title>
</head>
<body>
<div class="loginWraper">
	<div id="loginform" class="loginBox">
		<form class="form form-horizontal" action="index.html" method="post">
			<div class="row cl">
				<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
				<div class="formControls col-xs-8">
					<input id="" name="name" type="text" placeholder="账户" class="input-text size-L">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
				<div class="formControls col-xs-8">
					<input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
		    		<input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;" name="captcha">
		         	<img src="<?php echo url('manager/captcha'); ?>" onclick="refreshVerify()" style="cursor: pointer;" class="captcha"> <a id="kanbuq" href="javascript:refreshVerify()"><br />看不清，换一张</a> 
          		</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<label for="online">
						<input type="checkbox" name="online" id="online" value="">
						使我保持登录状态</label>
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
					<input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
				</div>
			</div>
		</form>
	</div>
</div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin.page.v3.0</div>

<script type="text/javascript" src="/static/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/hui/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript">
  $('#loginform').on('submit', function(){
    registPost();
    event.preventDefault() //阻止form表单默认提交
  })
  function registPost () {
    var name     = $("input[name='name']").val();
    var password = $("input[name='password']").val();
    var captcha  = $("input[name='captcha']").val();
    
    $.post("<?php echo url('manager/login'); ?>",{name:name,password:password,captcha:captcha},function(data){
      if (data.code > 0) {
        layer.msg(data.msg, {icon: 1},function(){
          window.location.href = "<?php echo url('admin/index/index'); ?>";
        });
      }else{
        layer.msg(data.msg, {icon: 5});
        refreshVerify();
      };
    })  
  }
  function refreshVerify() {
    var ts = Date.parse(new Date())/1000;
    $('.captcha').attr("src", "<?php echo url('manager/captcha'); ?>?id="+ts);
  }
</script>
</body>
</html>