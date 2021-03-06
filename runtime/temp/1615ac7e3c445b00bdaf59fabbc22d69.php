<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wamp\wamp64\www\video\public/../application/admins\view\home\index.html";i:1525346591;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/video/public/static/layui/css/layui.css">
    <script type="text/javascript" src="/video/public/static/layui/layui.js"></script>
    <meta charset="utf-8">
    <style type="text/css">
    	.header{width: 100%;height:50px;line-height: 50px;background: #337ab7; color: #ffffff }
    	.title{margin-left: 20px;font-size: 20px;}
    	.userinfo{float: right;margin-right: 20px;}
    	.userinfo a{color: #ffffff}
    	.menu{width: 200px;background: #333744;position: absolute; }
    	.main{position: absolute; left: 200px; right: 0px;}
    	.layui-collapse{border:none;}
    	.layui-colla-item{border-top: none;}
    	.layui-colla-title{background: #42485b;color: #ffffff;}
    	.layui-colla-content{padding: 0px;}
    </style>
</head>
<body>
     <div class="header">
     	<span class="title">后台管理系统管理</span>
     	<span class="userinfo">admin【管理员】<span><a href="../account/loginout">退出登录</a></span></span>
     	<!-- 菜单 -->
     	<div class="menu">
     		<div class="layui-collapse" lay-accordion>
     			<div class="layui-colla-item">
     				<h2 class="layui-colla-title">管理員管理</h2>
     				<div class="layui-colla-content layui-show">
     					<ul class="layui-nav layui-nav-tree" lay-filter="test">
     						<li class="layui-nav-item"><a href="javascript:;" onclick="menuFire(this)" src="../admin/index">管理員列表</a></li>
     					</ul>
     				</div>
     			<div class="layui-colla-item">
     				<h2 class="layui-colla-title">權限管理</h2>
     				<div class="layui-colla-content">
                        <ul class="layui-nav layui-nav-tree" lay-filter="test">
                            <li class="layui-nav-item"><a href="javascript:;" onclick="menuFire(this)" src="../Menu/index">菜单管理</a></li>
                        </ul>
                    </div>
                    <div class="layui-colla-content">
                        <ul class="layui-nav layui-nav-tree" lay-filter="test">
                            <li class="layui-nav-item"><a href="javascript:;" onclick="menuFire(this)" src="../Roles/index">角色管理</a></li>
                        </ul>
                    </div>
     			</div>
     			<div class="layui-colla-item">
     				<h2 class="layui-colla-title">系統設置</h2>
     				<div class="layui-colla-content">内容区域</div>
     			</div>
     		</div>
        </div>
     </div>
     <!--主操作界面-->
     <div class="main">
     	<iframe src="welcome" onload="resetMainHeight(this)" style="width: 100%;height: 100% ;" frameborder="0" scrolling="0"></iframe>
     </div>

     <script>
     	layui.use('element', function(){
     		var element = layui.element;
            $ = layui.jquery;
            
            resetMenuHeight();
     	});
     	//重新設置菜單內容高度
     	function resetMenuHeight(){
     		var height = document.documentElement.clientHeight - 50;
     		$('.menu').height(height);
     	}

     	// 重新設置主操作頁面高度
     	function resetMainHeight(obj){
            var height = parent.document.documentElement.clientHeight - 53;
            $(obj).parent('div').height(height);
     	}

     	//菜單點擊
     	function menuFire(obj){
            // 獲取url
            var src = $(obj).attr('src');
            // 設置iframe的src
            $('iframe').attr('src',src);
     	}
     </script>
</body>
</html>
