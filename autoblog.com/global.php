<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="zxx">
<!--<![endif]-->

<head>


	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="UTF-8" />
	<title>
		<?php
		echo get_config_property('title');
		?>
	</title>
	<meta name="description" content="Blog about cars" />
	<meta name="author" content="Unknown" />

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="css/zerogrid.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" />

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="css/menu.css" type="text/css" />
	<script src="js/jquery1111.min.js"></script>
	<script src="js/script.js"></script>

	<!-- Owl Carousel Assets -->
	<link rel="stylesheet" href="owl-carousel/owl.carousel.css" type="text/css" />
	<!-- <link rel="stylesheet" href="owl-carousel/owl.theme.css" type="text/css" /> -->

	<!--[if lt IE 8]>
       <div style="clear: both; text-align:center; position: relative;">
         <a href="http://windows.microsoft.com/en-US/internet-explorer/Items/ie/home?ocid=ie6_countdown_bannercode">
           <img src"http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
	<!--[if lt IE 9]>
		<script src="js/html5.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
</head>

<body>
	<div class="wrap-body">

		<!-- Header -->
		<div class="header">
			<?php
				start('templates'.SEPARATOR.'header'.FILE_EXTENSION);
			?>
		</div>

		<!-- Container -->
		<section id="container">
			<?php
				start('templates'.SEPARATOR.'container'.FILE_EXTENSION);
			?>
		</section>
		
		<!-- Footer -->
		<footer>
			<?php
				start('templates'.SEPARATOR.'footer'.FILE_EXTENSION);
			?>
		</footer>

		<script src="js/lightbox-plus-jquery.min.js"></script>

		<!-- Carousel -->
		<script src="owl-carousel/owl.carousel.js"></script>
		<script>
			$(document).ready(function () {
				$("#owl-slide").owlCarousel({
					autoPlay: 3000,
					items: 1,
					itemsDesktop: [1199, 1],
					itemsDesktopSmall: [979, 1],
					itemsTablet: [768, 1],
					itemsMobile: [479, 1],
					navigation: true,
					navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
					pagination: false
				});
			});
		</script>
	</div>
</body>

</html>
