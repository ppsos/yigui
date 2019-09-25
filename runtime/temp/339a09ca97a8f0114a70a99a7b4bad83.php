<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"G:\WWW_GIT\yigui\public/../application/admin\view\category\edit.html";i:1569422250;s:58:"G:\WWW_GIT\yigui\application\admin\view\public\footer.html";i:1569411795;}*/ ?>
<!DOCTYPE HTML>
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
<link href="/static/admin/hui/static/h-ui.admin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/static/admin/hui/lib/icheck/icheck.css" rel="stylesheet" type="text/css" />
<link href="/static/admin/hui/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script><![endif]-->
<title>添加产品分类</title>
</head>
<body>
<div class="pd-20">
  <form action="" method="post" class="form form-horizontal" id="form-user-add">
    <input type="hidden" value="<?php echo $res['id']; ?>" name="id" />
    <div class="row cl">
      <label class="form-label col-xs-3 col-sm-2">分类名称：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input type="text" class="input-text" value="<?php echo $res['name']; ?>" placeholder="" id="" name="name">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-3 col-sm-2">分类排序：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input type="text" class="input-text" value="<?php echo $res['sort']; ?>" placeholder="" id="" name="sort">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-3 col-sm-2">允许状态：</label>
      <div class="formControls col-xs-8 col-sm-9 skin-minimal">
        <div class="check-box">
          <input type="checkbox" <?php if($res['status'] == 1): ?>checked<?php endif; ?> name="status" id="checkbox-1">
          <label for="checkbox-1">&nbsp;</label>
        </div>
      </div>
    </div>

    <div class="row cl">
      <div class="col-8 col-offset-4">
        <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
      </div>
    </div>
  </form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/hui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/admin/hui/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$('form').submit(function() {
    var url  = "<?php echo request()->url(); ?>";
    var data = $(this).serialize();
    data = decodeURIComponent(data,true);

    $.post(url,data,function(data){
      if (data.code>0) {
        layer.msg(data.msg,function(){
          var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
          parent.layer.close(index); //再执行关闭 
        });
      }else{
        layer.msg(data.msg);
      }
    })
    return false;
  });
});
</script>
</body>
</html>