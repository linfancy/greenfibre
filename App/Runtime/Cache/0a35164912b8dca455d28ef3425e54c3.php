<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>greenfibre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="__CSS__/bootstrap.min.css" rel="stylesheet">
    <link href="__CSS__/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
<!--     <link href="//cdnjs.bootcss.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet"> -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.bootcss.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
<!--     <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png"> -->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">greenfibre</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <?php echo ($result["user_name"]); ?> &nbsp&nbsp&nbsp<a href="#" class="navbar-link">退出</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">首页</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">栏目管理</li>
              <li <?php if($type == 1 ): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/item');?>/type/1">Gardening Supplies</a></li>
              <li <?php if($type == 2 ): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/item');?>/type/2">Tableware</a></li>
              <li <?php if($type == 3 ): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/item');?>/type/3">Pet Appliances</a></li>
              <li class="nav-header">文章编辑</li>
              <li <?php if($type == 'quote' ): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/quote');?>">意见箱</a></li>
              <li class="nav-header">用户设置</li>
              <li><a href="#">修改邮箱设置</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row-fluid">
            <div class="span4">
              <h4><?php echo ($vo["name"]); ?>的意见信</h4>
              <p>电话：<?php echo ($vo["tel"]); ?></p>
              <p>邮件：<?php echo ($vo["email"]); ?></p>
              <p>用户ip：<?php echo ($vo["userip"]); ?></p>
              <p>地址：<?php echo ($vo["address"]); ?></p>
              <p>内容：<?php echo ($vo["msg"]); ?></p>
              <p>发送时间：<?php echo ($vo["send_date"]); ?></p>
              <p><input type="hidden"value="<?php echo ($vo["quote_id"]); ?>" class="quote_id"><a class="btn" href="" data-toggle="modal" data-target="#confirm_dialog">删除 &raquo;</a></p>
            </div><!--/span-->
            
          </div><!--/row--><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><!--/span-->
      </div><!--/row--> 

      <hr>

      <div class="modal fade" id="confirm_dialog">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">确认操作</h4>
            </div>
             <div class="modal-body">
              <p>本操作不可恢复，确定删除？</p>
              </div>                
            <div class="modal-footer">
              <input type="hidden" id="deleteRoleId" value="">
                <a href="#" class="btn btn-danger" id="my_deleteRole">确认</a>
            </div>
      </div>
    </div>
  </div>  

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="//cdnjs.bootcss.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
      <script src="__JS__/jquery.min.js"></script>
  <script src="__JS__/holder.js"></script>
  <script src="__JS__/bootstrap.min.js"></script>
  <script src="__JS__/download_jq.js"></script>
  <script src="__JS__/cms.js"></script>
  <script type="text/javascript">
  /**
  *点击角色删除按钮
  */
  $('.btn').live('click',function(){
    var block_id=$(this).siblings('.quote_id').val();
    $('#deleteRoleId').val(block_id);
  });
  /**
  *点击确定删除按钮
  */
  $('#my_deleteRole').click(function(){
    var quote_id=$('#deleteRoleId').val();
    var url = '<?php echo U("Admin/quote");?>';
    $.ajax({
      type:'post',
      data:{
        quote_id:quote_id,
      },
      async:false,
      url:'<?php echo U("Event/delQuote");?>',
      success:function(json){
        $('.close').trigger('click');
        window.location.href=url;
      },
      error:function(data,status,e){
        alert(e);
      }
    });
  }); 

    </script>

  </body>
</html>