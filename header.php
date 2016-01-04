<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		<?php include( 'partials/advertising/head.php' ); ?>
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
	</head>
	
	<!-- Uncomment this line if using the Off-Canvas Menu --> 
		
	<body <?php body_class(); ?>>
  	
  	<!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MJMM7P"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MJMM7P');</script>
    <!-- End Google Tag Manager -->
					
	<header class="header" role="banner">

			<div class="row">
<!--  		<div class="small-12 columns">
    		<div class="banner-top">
          <?php // include( 'partials/advertising/bannerTop.php' ); ?>
  	    </div>
  		</div>
-->
		 <!-- This navs will be applied to the topbar, above all content 
			  To see additional nav styles, visit the /parts directory -->
		 <?php  get_template_part( 'partials/nav', 'topbar' ); ?>
       </div>
	</header> <!-- end .header -->
	<!--googleoff: snippet -->
	<div class="feature-area">
  	<div class="row"> 
    	<div class="small-12 medium-10 medium-centered columns note lead text-center">
      	<?php the_field('welcome_note','options'); ?>
    	</div>
	  </div>
	</div>
	<!--googleon: snippet -->