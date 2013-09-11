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
	<section id="index-banner" class="container header-fix">
		<h2 class="offscreen">Banner</h2>
		<img src="__IMG__<?php echo (L("pic")); ?>" alt="ORDINARY MAKES IT DISTINCTIVE" width="100%">
	</section>
	<!-- /.container -->

	<section id="products">
		<div class="container">
			<h2>GREEN FIBRE PRODUCTS</h2>
			<p>Made From Natural Plant Fibre</p>

			<ul class="group">
				<li><i class="icon-garden sprite"></i><h3>Gardening Supplies</h3></li>
				<li><i class="icon-table sprite"></i><h3>Tableware</h3></li>
				<li><i class="icon-pet sprite"></i><h3>Pet Appliances</h3></li>
			</ul>
		</div>
	</section>
	<!-- /#products -->
	
	<section id="map">
		<div class="container">
			<h2>LOVE THE EARTH  CHERISH OUR HEALTH</h2>
			<img src="__IMG__/map.png" alt="世界地图" width="697">
		</div>
	</section>
	<!-- /#map -->
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