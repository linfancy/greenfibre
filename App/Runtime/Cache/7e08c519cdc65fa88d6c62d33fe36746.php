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
	<section id="contact" class="container header-fix">
		<h2 class="offscreen">Contact</h2>
		<ul class="group">
			<li>
				<i class="icon-address sprite"></i>
				<p class="first">Room 1008,jindi building,zhongshan 1 road,guangzhou city,guangdong province,china</p>
			</li>
			<li class="mid">
				<i class="icon-mail sprite"></i>
				<p><a href="mailto:Greenfibre.world@gmail.com">Greenfibre.world@gmail.com</a></p>
			</li>
			<li>
				<i class="icon-tel sprite"></i>
				<p>020-22077751</p>
			</li>
		</ul>

		<p>If you want to know more about our products, please feel free to contact us.</p>
	</section>
	<!-- /#contact.container -->
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