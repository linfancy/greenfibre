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
	<section id="product-nav" class="container header-fix">
		<h2 class="offscreen">Product Navigation</h2>
		<ul class="group">
			<li><ul>
				<li>
					<i class="icon-garden sprite"></i>
					<h3>Gardening Supplies</h3>
				</li>
				<li><a href="<?php echo U('Index/introduce');?>/type/1" class="nav-garden"></a></li>
			</ul></li>
			<li><ul>
				<li>
					<i class="icon-table sprite"></i>
					<h3>Tableware</h3>
				</li>
				<li><a href="<?php echo U('Index/introduce');?>/type/2" class="nav-table"></a></li>
			</ul></li>
			<li><ul>
				<li>	
					<i class="icon-pet sprite"></i>
					<h3>Pet Appliances</h3>
				</li>
				<li><a href="<?php echo U('Index/introduce');?>/type/3" class="nav-pet"></a></li>
			</ul></li>
		</ul>
	</section>
	<!-- /#product-nav.container -->
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
	<script>
		$(document).ready(function () {
			$('#product-nav').delegate('.group > li', 'mouseenter mouseleave', function (evt) {
				if (evt.type === 'mouseenter') {
					$(this).find('ul').stop(true, true).animate({'margin-top': '-=496px'}, 600);
				} else {
					$(this).find('ul').stop(true, true).animate({'margin-top': '+=496px'}, 600);
				}
			});
		});
	</script>