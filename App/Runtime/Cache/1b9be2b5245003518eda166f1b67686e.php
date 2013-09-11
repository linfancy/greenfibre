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
          <div class="row-fluid">
            <div class="span4">
              <h2>"联系我们"页面编辑</h2>
              <form action="<?php echo U('Event/doContact');?>" method="post">
              <p>地址：中文：<textarea rows="5" name="address"><?php echo ($result["address"]); ?></textarea>
                英文：<textarea rows="5" name="address_en"><?php echo ($result["address_en"]); ?></textarea></p>
              <p>邮箱：<input type="text" name="email" value="<?php echo ($result["email"]); ?>"></p>
              <p>电话：<input type="text" name="tel" value="<?php echo ($result["tel"]); ?>"></p>
              <p><button type="submit" class="btn">提交 &raquo;</button></p>
            </form>
            </div><!--/span-->
            
          </div><!--/row-->
        
        </div><!--/span-->
      </div><!--/row--> 

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="//cdnjs.bootcss.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
      <script src="__JS__/jquery.min.js"></script>
    <script src="__JS__/bootstrap.min.js"></script>

  </body>
</html>