<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Greenfibre|Product Introduction</title>
	<!--[if lt IE 9]><script src="scripts/html5shiv.min.js"></script><![endif]-->
	<link rel="stylesheet" href="__CSS__/screen.css" media="screen">
</head>
<body>
	<header id="header" class="container">
		<h1 id="logo"><a href="index.html">
			<img src="__IMG__/logo.png" alt="Greenfibre's logo" width="48" height="65">
		</a></h1>
		<nav>
			<h2 class="offscreen">Navigation</h2>
			<ul class="group">
				<li><a href="<?php echo U('Index/about');?>"><?php echo (L("aboutus")); ?></a></li>
				<li><a href="<?php echo U('Index/product');?>">PRODUCT</a></li>
				<li><a href="<?php echo U('Index/contact');?>">CONTACT</a></li>
				<li><a href="<?php echo U('Index/advice');?>">GET QUOTES</a></li>
			</ul>
		</nav>
		<ul id="lang" class="group">
			<li><a href="">CHINESE</a></li>
			<li><a href="">ENGLISH</a></li>
		</ul>
	</header>
	<!-- /#header -->
	<section id="quote" class="container header-fix">
		<h2>Get Quotes </h2>
		<section>
			<ul>
				<li><label for="q-name">Name</label></li>
				<li><input type="text" id="q-name"></li>
				<li><label for="q-add">Address</label></li>
				<li><input type="text" id="q-add"></li>
				<li><label for="q-tel">Phone</label></li>
				<li><input type="text" id="q-tel"></li>
				<li><label for="q-mail">E-mail</label></li>
				<li><input type="text" id="q-mail"></li>
				<li><label for="q-msg">Leave a message</label></li>
				<li><textarea name="" id="q-msg" cols="30" rows="10"></textarea></li>
			</ul>
			<p>We value our customers and are committed to bringing exquisite designs at great prices to our valuable customers. Please send us your inquiry and we will get back to you very soon.</p>
			<input type="submit" value="Send Message" id="send_message">
			<p style="color:red" id="error_tip"></p>
		</section>
		<img src="__IMG__/quote-bg.jpg" alt="留言背景" width="100%"></section>
	<!-- /#quote.container -->

	<footer id="footer">
		<section class="container">
			<h2 class="offscreen">Footer</h2>
			<h3><a href="index.html">
				<img src="__IMG__/footer-logo.png" alt="Greenfibre's footer" width="66" height="46">
			</a></h3>
		</section>
	</footer>
	<!-- /#footer -->

	<script src="__JS__/jquery.min.js"></script>
</body>
</html>
<script type="text/javascript" src="__JS__/validation.js"></script>
<script type="text/javascript">
$('#send_message').click(function(){
	var q_name = $('#q-name').val();
	var q_add = $('#q-add').val();
	var q_tel = $('#q-tel').val();
	var q_mail = $('#q-mail').val();
	var q_msg = $('#q-msg').val();
	if(isNotNull(q_name)&&isNotNull(q_add)&&isNotNull(q_tel)&&isNotNull(q_mail)&&isNotNull(q_msg)){
		if(isValidEmail(q_mail)){
			if(!isValidPhone(q_tel)){
				$('#error_tip').html('电话格式错误');
			}else{
				$('#error_tip').html('');
				$(this).val('sending...');
				$.ajax({
					type:'post',
					url:'<?php echo U("Index/doAdvice");?>',
					data:{
						q_name:q_name,
						q_add:q_add,
						q_tel:q_tel,
						q_mail:q_mail,
						q_msg:q_msg,
					},
					success:
						function(data){	
							alert(data.info);
							window.location.href='<?php echo U("Index/advice");?>';
						}

				});
			}
		}else{
			$('#error_tip').html('邮箱格式不符合');
		}
	}else{
		$('#error_tip').html('不可为空');
	}
})
</script>