<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<title>
			<?php if (is_home()) { echo bloginfo('name');
			} elseif (is_404()) {
			echo '404 Not Found';
			} elseif (is_category()) {
			echo 'Category:'; wp_title('');
			} elseif (is_search()) {
			echo 'Search Results';
			} elseif ( is_day() || is_month() || is_year() ) {
			echo 'Archives:'; wp_title('');
			} else {
			echo wp_title('');
			}
			?>
		</title>

	    <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
		<meta name="description" content="<?php bloginfo('description') ?>" />
		<?php if(is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" /> 
	    <?php }?>
	
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_head(); ?>
		
		<script src="http://www.google.com/jsapi" type="text/javascript"></script>
	    <script type="text/javascript">
	        google.load("jquery", "1.2.6");
	    </script>
	    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/qod.js"></script>

	</head>

	<body>
	
		<div id="header">
	
			<h1><a href="/">Quotes <span>on</span> Design</a></h1>
			
			<div id="ad-area">
			
			 <script type="text/javascript">
                Vertical1237264 = false;
                ShowAdHereBanner1237264 = true;
                RepeatAll1237264 = false;
                NoFollowAll1237264 = false;
                BannerStyles1237264 = new Array(
                	"a{display:block;font-size:11px;color:#888;font-family:verdana,sans-serif;margin:0 4px 10px 0;text-align:center;text-decoration:none;overflow:hidden;}",
                	"img{border:0;clear:right;}",
                	"a.adhere{color:#666;font-weight:bold;font-size:12px;border:1px solid #ccc;background:#e7e7e7;text-align:center;}",
                	"a.adhere:hover{border:1px solid #999;background:#ddd;color:#333;}"
                );
                
                document.write(unescape("%3Cscript src='"+document.location.protocol+"//s3.buysellads.com/1237264/1237264.js?v="+Date.parse(new Date())+"' type='text/javascript'%3E%3C/script%3E"));
                </script>
			
			</div>
			
			<div id="extra-stuff">
				
				<a href="/archive/">Archive</a>
			
				<a href="http://feeds.feedburner.com/QuotesOnDesign">RSS Feed</a>
				
				<a href="/submit/">Got one?</a>
				
				<a href="/">Another!</a>
				
			</div>
		
		</div>