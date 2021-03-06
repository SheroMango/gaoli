<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>后台管理</title>

<!--CSS BEGIN-->
<link href="__PUBLIC__/Home/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="./public/js/plugin/fancybox/jquery.fancybox.css?v=2.1.4" />
<link href="__PUBLIC__/css/base.css"       rel="stylesheet" type="text/css">
<link href="__PUBLIC__/css/common.css"     rel="stylesheet" type="text/css">
<link href="__PUBLIC__/Home/css/page.css"  rel="stylesheet" type="text/css">
<link href="__PUBLIC__/jquery.ui/jquery-ui.css" rel="stylesheet" type="text/css">
<!--CSS END-->

<!--JS BEGIN-->
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/base.js"></script> 
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>  
<script type="text/javascript" src="__PUBLIC__/Home/js/page.js"></script>
<script type="text/javascript" src="__PUBLIC__/jquery.ui/jquery-ui.js"></script>
<!--script type="text/javascript" src="http://code.jquery.com/qunit/qunit-1.14.0.js"></script-->
<!--JS BEGIN-->


</head>
<body>
<div class="content">


  <!--选项卡 BEGIN-->
  <div class="tabs">
    <ul>
      <li class="current"><a href="javascript:void(0)" class="current">留言列表</a></li>
    </ul>
  </div>
  <!--END 选项卡-->


  <!--搜索 BEGIN-->
<div class="search">
    <form action="<?php echo U('Home/Message/ls');?>" method="post">
        <table width="100%">
            <td width="100">
              <input type="text" name="search" class="w300 mr10" placeholder="请输入姓名或手机号查询" />
            </td>
            <td><input type="submit" value="搜 索" class="btn search-btn" /></td>
        </table>
    </form>
</div>
<!--END 搜索--> 

  <!--END工具栏 BEGIN-->
  
  <!--列表 BEGIN-->
  <div class="list">
      <form action="<?php echo U('Home/Message/del');?>" method="post" class="del-form">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th width="5%"><input type="checkbox" class="check-all" /></th>
            <th width="15%"><a href="<?php echo U('Home/Message/ls',array('sort'=>'username','type'=>$type));?>">姓名</th>
            <th width="15%"><a href="<?php echo U('Home/Message/ls',array('sort'=>'usertel','type'=>$type));?>">联系方式</th>
            <th width="15%"><a href="<?php echo U('Home/Message/ls',array('sort'=>'time_add','type'=>$type));?>">留言时间</th>
            <th width="15%">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php if(empty($list)): ?><tr>
              <td colspan="11" class="empty">暂无留言</td>
            </tr>
          <?php else: ?>
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>"></td>
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["usertel"]); ?></td>
                <td><?php echo (date("Y-m-d H:i", $vo[time_add])); ?></td>
                <td>
                    <a href="<?php echo U('Home/Message/info',array('id'=>$vo[id]));?>" class="mr10">查看</a>
                    <a href="<?php echo U('Home/Message/del',array('id'=>$vo[id]));?>">删除</a>
                </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </tbody>
      </table>
    </form>
  </div>
  <!--列表 END-->

  <!--工具栏 BEGIN-->
  <div class="toolbar">
    <a href="javascript:void(0)" class="btn del-btn"><span>删除</span></a>
    <div class="page right">
      <?php echo ($pages); ?>
    </div>
  </div>
  <!--END 工具栏-->

</div>
</body>
</html>