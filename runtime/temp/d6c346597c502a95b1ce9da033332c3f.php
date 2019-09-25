<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:69:"G:\WWW_GIT\yigui\public/../application/admin\view\category\lists.html";i:1569424229;s:55:"G:\WWW_GIT\yigui\application\admin\view\public\top.html";i:1569411795;s:58:"G:\WWW_GIT\yigui\application\admin\view\public\header.html";i:1569411795;s:56:"G:\WWW_GIT\yigui\application\admin\view\public\menu.html";i:1569413951;s:58:"G:\WWW_GIT\yigui\application\admin\view\public\footer.html";i:1569411795;}*/ ?>
﻿<!--_meta 作为公共模版分离出去-->
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

<title>品牌管理</title>
</head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">H-ui.admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a> 
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.0</span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
							<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
							<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
				</ul>
			</li>
		</ul>
	</nav>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>超级管理员</li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
							<li><a href="#">切换账户</a></li>
							<li><a href="#">退出</a></li>
				</ul>
			</li>
					<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
</div>
</header>
<!--/_header 作为公共模版分离出去--><!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 资讯管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="<?php echo url('article/lists'); ?>" title="资讯管理">资讯管理</a></li>
					<li><a href="<?php echo url('category/lists'); ?>" title="分类管理">分类管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 图片管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="picture-list.html" title="图片管理">图片管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="product-brand.html" title="品牌管理">品牌管理</a></li>
					<li><a href="product-category.html" title="分类管理">分类管理</a></li>
					<li><a href="product-list.html" title="产品管理">产品管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="http://h-ui.duoshuo.com/admin/" title="评论列表">评论列表</a></li>
					<li><a href="feedback-list.html" title="意见反馈">意见反馈</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="member-list.html" title="会员列表">会员列表</a></li>
					<li><a href="member-del.html" title="删除的会员">删除的会员</a></li>
					<li><a href="member-level.html" title="等级管理">等级管理</a></li>
					<li><a href="member-scoreoperation.html" title="积分管理">积分管理</a></li>
					<li><a href="member-record-browse.html" title="浏览记录">浏览记录</a></li>
					<li><a href="member-record-download.html" title="下载记录">下载记录</a></li>
					<li><a href="member-record-share.html" title="分享记录">分享记录</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="admin-role.html" title="角色管理">角色管理</a></li>
					<li><a href="admin-permission.html" title="权限管理">权限管理</a></li>
					<li><a href="admin-list.html" title="管理员列表">管理员列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-tongji">
			<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="charts-1.html" title="折线图">折线图</a></li>
					<li><a href="charts-2.html" title="时间轴折线图">时间轴折线图</a></li>
					<li><a href="charts-3.html" title="区域图">区域图</a></li>
					<li><a href="charts-4.html" title="柱状图">柱状图</a></li>
					<li><a href="charts-5.html" title="饼状图">饼状图</a></li>
					<li><a href="charts-6.html" title="3D柱状图">3D柱状图</a></li>
					<li><a href="charts-7.html" title="3D饼状图">3D饼状图</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="system-base.html" title="系统设置">系统设置</a></li>
					<li><a href="system-category.html" title="栏目管理">栏目管理</a></li>
					<li><a href="system-data.html" title="数据字典">数据字典</a></li>
					<li><a href="system-shielding.html" title="屏蔽词">屏蔽词</a></li>
					<li><a href="system-log.html" title="系统日志">系统日志</a></li>
				</ul>
			</dd>
		</dl>
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 品牌管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
		
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
				<form class="Huiform" method="post" action="" target="_self">
					<input type="text" placeholder="分类名称" name="name" value="" class="input-text" style="width:120px">
					<span class="btn-upload form-group">
					</span><button type="button" class="btn btn-success" id="" onClick="picture_colume_add(this);"><i class="Hui-iconfont">&#xe600;</i> 添加</button>
				</form>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong><?php echo count($data); ?></strong> 条</span> </div>
			<div class="mt-10">
				<table class="table table-border table-bordered table-bg table-sort">
					<thead>
						<tr class="text-c">
							<th width="25"><input type="checkbox" name="" value=""></th>
							<th width="70">ID</th>
							<th width="80">排序</th>
							<th>分类名称</th>
							<th>分类状态</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<tr class="text-c">
							<td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="id[]"></td>
							<td class="id"><?php echo $vo['id']; ?></td>
							<td><input type="text" class="input-text text-c" name="sort" value="<?php echo $vo['sort']; ?>"></td>
							<td class="text-c"> <?php echo $vo['name']; ?></td>
							<td class="text-c td-status"><?php if($vo['status'] == 0): ?>已禁用<?php else: ?>显示<?php endif; ?></td>
							<td class="f-14 product-brand-manage td-manage">
								<?php if($vo['status']==1): ?>
									<a style="text-decoration:none" onClick="admin_stop(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
								<?php else: ?>
									<a onclick="admin_start(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont"></i></a>
								<?php endif; ?>
								<a style="text-decoration:none" onClick="product_brand_edit('编辑分类','<?php echo url('category/edit',array('id'=>$vo['id'])); ?>','500px','300px')" href="javascript:;" title="编辑">
									<i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="active_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="删除">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
							</td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
		</article>
	</div>
</section>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/hui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/admin/hui/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/static/admin/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>  
<script type="text/javascript" src="/static/admin/hui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/admin/hui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
function picture_colume_add(job) {
	var name = $("input[name='name']").val();
	var url  = "<?php echo request()->url(); ?>";
	$.post(url,{name:name},function(data){
		if (data.code>0) {
			layer.msg(data.msg,function(){
				window.location.reload();
			});
		}else{
			layer.msg(data.msg);
		}
	})
}
$('.table-sort').dataTable({
	"pageLength": 10,         //初始化显示几条数据
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	]
});
/*分类-修改*/
function product_brand_edit(title,url,w,h){
	var index = layer.open({
		type: 2,
		area:[w,h],
		title: title,
		content: url,
		end: function () {
            window.location.reload();
        }
	});
	// layer.full(index);
}

/*分类-删除*/
function active_del(obj,id){
	var url  = "<?php echo url('category/del'); ?>";
	layer.confirm('确定删除此分类？', function(index){
		$.post(url,{id:id},function(data){
			if (data.code > 0) {
				layer.msg(data.msg,{icon:1,time:1000},function(){
					location.reload();
				});
			}else{
				layer.msg(data.msg,{icon:1,time:1000});
			}
		})
	}); 
}
/*分类-批量删除*/
function datadel(){
	var ids = [];
	var url = "<?php echo url('category/del'); ?>";
	$("input[name='id[]']:checkbox:checked").each(function() {
        ids.push($(this).val());
    });
    layer.confirm('确认要删除吗？',function(index){
	    $.post(url,{id:ids},function(data){
			if (data.code > 0) {
				layer.msg(data.msg,{icon:1,time:1000},function(){
					location.reload();
				});
			}else{
				layer.msg(data.msg,{icon:1,time:1000});
			}
		})
	});
}
/*分类-排序修改*/
$("input[name='sort']").blur(function(){
	var url  = "<?php echo url('category/edit'); ?>";
	var sort = $(this).val();
	var id   = $(this).parent().parent().find('.id').text();
	
	$.post(url,{id:id,sort:sort},function(data){
		if (data.code > 0) {
			layer.msg(data.msg,{icon:1,time:1000},function(){
				location.reload();
			});
		}else{
			layer.msg(data.msg,{icon:1,time:1000});
		}
	})
})
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.post("<?php echo url('category/get_status'); ?>",{id:id,status:'0'},function(data){
			if (data.code > 0) {
				$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
				$(obj).parents("tr").find(".td-status").html('已禁用');
				$(obj).remove();
				layer.msg('已停用!',{icon: 6,time:1000});
			}else{
				layer.msg('停用失败!',{icon: 5,time:1000});
			}
		});
		
	});
}
/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.post("<?php echo url('category/get_status'); ?>",{id:id,status:'1'},function(data){
			if (data.code > 0) {
				$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
					$(obj).parents("tr").find(".td-status").html('显示');
					$(obj).remove();
					layer.msg('已显示!', {icon: 6,time:1000});
			}else{
				layer.msg('停用失败!',{icon: 5,time:1000});
			}
		});
	});
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>