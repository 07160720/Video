<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wamp\wamp64\www\video\public/../application/admins\view\roles\add.html";i:1525590289;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <title>添加角色</title>
  <link rel="stylesheet" type="text/css" href="/video/public/static/layui/css/layui.css">
    <script type="text/javascript" src="/video/public/static/layui/layui.js"></script>
    <meta charset="utf-8">
</head>
<body style="padding: 10px">
    <form class="layui-form">
        <input type="hidden" name="gid" value="<?php echo $role['gid']; ?>">
        <div class="layui-form-item">
             <label class="layui-form-label">角色名称</label>
             <div class="layui-input-block">
               <input type="text" class="layui-input" name="title" value="<?php echo $role['title']; ?>">
             </div> 
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">权限菜单</label>
            <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="layui-input-block">
               <input type="checkbox" class="layui-input" name="menu[<?php echo $vo['mid']; ?>]" lay-skin="primary" title="<?php echo $vo['title']; ?>" <?php echo isset($role['rights']) && $role['rights'] && in_array($vo['mid'],$role['rights'])?'checked':''; ?>>
               <hr>
               <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?>
               <input type="checkbox" name="menu[<?php echo $cvo['mid']; ?>]" lay-skin="primary" title="<?php echo $cvo['title']; ?>" <?php echo isset($role['rights']) && $role['rights'] && in_array($cvo['mid'],$role['rights'])?'checked':''; ?>>
               <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </form>
    <div class="layui-form-item">
      <div class="layui-input-block">
           <button class="layui-btn" onclick="save()">保存</button>
      </div>
    </div>
     <script type="text/javascript">
          layui.use(['layer','form'],function(){
            form = layui.form;
            layer = layui.layer;

            $ = layui.jquery;
          });

          function save(){
            var title = $.trim($('input[name="title"]').val());
            if (title == '') {
              layer.msg('请填写角色名称',{'icon':2});
            }
            $.post('../roles/save',$('form').serialize(),function(res){
                 if (res.code>0) {
                     layer.msg(res.msg,{'icon':2});
                 }else{
                    layer.msg(res.msg,{'icon':1});
                    setTimeout(function(){parent.window.location.reload();},1000);
                 }
            },'json');
          }
      </script>
</body>
</html>