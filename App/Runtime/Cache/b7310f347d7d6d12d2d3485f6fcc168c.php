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
	<section id="product-banner" class="header-fix">
		<div class="container">
			<h2 class="offscreen">Banner</h2>
			<ul class="items">
				<?php if(is_array($result["banner"])): $i = 0; $__LIST__ = $result["banner"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><li><img src="__UPLOAD__<?php echo ($co); ?>" alt="Garden's banner" width="894" height="319"></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<ol class="nums">
				<?php if(is_array($result["banner"])): $i = 0; $__LIST__ = $result["banner"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><li><?php echo ($i); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ol>
			<input type="button" value="next" class="button next sprite">
		</div>
	</section>
	<!-- /#product-banner.container -->

	<section id="product-intro" class="container">
		<h2 class="title"><?php echo ($result["line1_title"]); ?></h2>
		<p><?php echo ($result["line1_text"]); ?></p>
		<img src="__UPLOAD__<?php echo ($result["line1_pic"]); ?>" alt="Garden's Introduction" width="452" height="302">
	</section>
	<!-- /#product-intro.container -->

	<section id="show">
		<div class="container group">
			<h2><?php echo ($result["line2_title"]); ?></h2>
			<p><?php echo ($result["line2_text"]); ?></p>
			<img src="__UPLOAD__/<?php echo ($result["line2_pic"]); ?>" alt="" width="416" height="278" id="show-win">

			<div id="show-list">
				<ol>
					<li><ul>
					<?php if(is_array($result["line2_spic"])): $i = 0; $__LIST__ = $result["line2_spic"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($i%6==1)&& $i!=1) echo '</ul></li><li><ul>' ?>
						<li>
							<img src="__UPLOAD__<?php echo ($vo); ?>" alt="" width="133" height="89">
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul></li>
					<!-- <li>
						<ul>
							<li><img src="__IMG__/show1.jpg" alt="" width="133" height="89"></li>
							<li><img src="__IMG__/intro1.jpg" alt="" width="133" height="89"></li>
							<li><img src="__IMG__/show1.jpg" alt="" width="133" height="89"></li>
							<li><img src="__IMG__/intro1.jpg" alt="" width="133" height="89"></li>
							<li><img src="__IMG__/show1.jpg" alt="" width="133" height="89"></li>
							<li><img src="__IMG__/show1.jpg" alt="" width="133" height="89"></li>
						</ul>
					</li> -->
					<!-- <li>
						<ul>
							<li><img src="__IMG__/show1.jpg" alt="" width="133" height="89"></li>
							<li><img src="__IMG__/intro1.jpg" alt="" width="133" height="89"></li>
							<li><img src="__IMG__/show1.jpg" alt="" width="133" height="89"></li>
							<li><img src="__IMG__/intro1.jpg" alt="" width="133" height="89"></li>
							<li><img src="__IMG__/show1.jpg" alt="" width="133" height="89"></li>
							<li><img src="__IMG__/intro1.jpg" alt="" width="133" height="89"></li>
						</ul>
					</li> -->
				</ol>

				<input type="button" value="next" class="button sprite">
			</div>
			<!-- /#show-list -->
		</div>
	</section>
	<!-- /#show -->

	<section id="footer-nav" class="container">
		<ul class="group">
			<li><a href="<?php echo U('Index/introduce');?>/type/1" class="nav-garden-min sprite">Garden</a></li>
			<li><a href="<?php echo U('Index/introduce');?>/type/2" class="nav-table-min sprite">Table</a></li>
			<li><a href="<?php echo U('Index/introduce');?>/type/3" class="nav-pet-min sprite">Pet</a></li>
		</ul>
		<a href="" class="icon-mail-min sprite">Contact us</a>
		<p>If you want to know more about our products, please feel free to contact us.  </p>
	</section>
	<!-- /#footer-nav.container -->

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
<script src="__JS__/jquery.components.min.js"></script>
	<script>
		$(document).ready(function () {
			var num = 0;

			$('#product-banner').promo();
			$('#show-list').showpic('#show-win');


			$('#show-list input').click(function () {
				$uls = $('#show-list ul');
				l = $uls.size();
				$uls.filter(':visible').hide()
					.end().eq(num++ % l).show();
			});
		});
	</script>