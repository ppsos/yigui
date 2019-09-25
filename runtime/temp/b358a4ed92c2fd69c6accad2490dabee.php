<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"G:\WWW_GIT\yigui\public/../application/admin\view\article\add.html";i:1569426463;s:55:"G:\WWW_GIT\yigui\application\admin\view\public\top.html";i:1569411795;s:58:"G:\WWW_GIT\yigui\application\admin\view\public\footer.html";i:1569411795;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="favicon.ico" >
<link rel="Shortcut Icon" href="favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->
<link rel="stylesheet" href="/static/admin/hui/lib/layui/css/layui.css" media="all">
<title>新增文章 - 资讯管理</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">分类栏目：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="category_id" class="select">
					<option value="0">全部分类</option>
					<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span> 
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="0" placeholder="" id="" name="sort">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">是否推荐：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="check-box">
					<input name="is_index" type="checkbox" id="checkbox-is_index">
					<label for="checkbox-is_index">&nbsp;</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">是否显示：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="check-box">
					<input name="status" type="checkbox" id="checkbox-pinglun">
					<label for="checkbox-pinglun">&nbsp;</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<button type="button" class="layui-btn" id="cover">
						<i class="layui-icon">&#xe67c;</i>上传图片
					</button>
					<div id="image"></div>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" name="content" type="text/plain" style="width:100%;height:400px;"></script> 
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button id="add_acticle" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/hui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/admin/hui/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>   
<script type="text/javascript" src="/static/admin/hui/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script> 
<script type="text/javascript" src="/static/admin/hui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/layui/layui.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});	
	var ue = UE.getEditor('editor');

	// 添加新闻
	$("#add_acticle").click(function(){
		// content = ue.getContent();
		var url  = "<?php echo request()->url(); ?>";
		var data = $("#form-article-add").serialize();
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
	})
	
	layui.use('upload', function(){
		var upload = layui.upload;

		// 单图上传
		var uploadInst = upload.render({
			elem: '#cover' //绑定元素
			,url: "<?php echo url('update/image'); ?>" //上传接口
			,done: function(res){
				//上传完毕回调
				$("#image").html('<img style="display:block;width:200px;height:80px;" src="'+res.data.src+'" alt=""><input type="hidden" name="cover_id" value="'+res.data.cover_id+'">');
			}
			,error: function(res){
				layer.msg(res.msg);
			}
		});
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>