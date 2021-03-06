<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; greenfibre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
  <link rel="stylesheet" href="__CSS__/bootstrap.min.css">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        font-family:'microsoft yahei ui',Microsoft Yahei,Verdana,Helvetica,Arial,'Simsun'; 
      }
      h1,h2,h3,h4,h5{
        font-family:'microsoft yahei ui',Microsoft Yahei,Verdana,Helvetica,Arial,'Simsun'; 
      }      

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 20px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  </head>

  <body>
    <div class="container">

      <form class="form-signin" action="" method='post'>
        <h2 class="form-signin-heading">登陆 greenfibre </h2>
        <input type="text" class="input-block-level" placeholder="请输入用户名" name="email" id="username">
        <input type="password" class="input-block-level" placeholder="密码" name='pass' id="pass">
        <label class="checkbox">
          <input type="checkbox" value="remember-me" name="remenber">记住我
          <div style="float:right;color:red" id="email_tip"></div>
        </label>

        <input type="hidden" name="hide" value="1">
        <button class="btn btn-large btn-primary" id="login">登陆</button>
      </form>

    </div> <!-- /container -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="__JS__/jquery.min.js"></script>
  <script src="__JS__/bootstrap.min.js"></script>
  <script src="__JS__/download_jq.js"></script>
  <script src="__JS__/validation.js"></script>
  <script type="text/javascript">
    function isTruePassword(password,email,murl){
      var bool;
      $.ajax({
        async: false,
        type: 'post',
        url: murl,
        data: {'email': email, 'pass':password,'submitted': 'submitted'},
        success: function(data) {
          if (data == 'fail') {
            bool = false;
          }else{
            bool = true;
          }
        }
      });
      return bool;
    }

    /**
    * 检查密码是否合法
    */
    function checkPassword(reg_pass,reg_email,email_tip,url) {
      var password = $(reg_pass).val();
      var email =$(reg_email).val();
      // 检查密码的合法性
      if(!(isNotNull(password)&&isNotNull(email))){
        $(email_tip).html('邮箱或密码不能为空');
        return false;
      }
      if (!isTruePassword(password,email,url)) {
        $(email_tip).html('邮箱或密码错误');
        return false;
      } else {
        $(email_tip).html('');
        return true;
      }
    }
    /**
    *点击登录按钮
    */
    $('#login').click(function(){
      var username=$('#username').val();
      var pass=$('#pass').val();
      var url='<?php echo U("index.php/Admin/doLogin");?>';
      var bool=checkPassword('#pass','#username','#email_tip',url);
      if(bool){
        window.location.href='<?php echo U("Admin/index");?>';
        return false;
      }else{
        return false;
      }
    });

  </script>

  </body>
</html>