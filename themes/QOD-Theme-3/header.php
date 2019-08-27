<!DOCTYPE html>
<html lang="en">

<head>

	<title>Quotes on Design</title>

	<meta charset="<?php bloginfo('charset') ?>">

	<link rel="shortcut icon" href="/favicon.ico">

	<?php if(is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" />
	<?php }?>

	<meta name="google-site-verification" content="dNQlo36DPX8fNXWCQzB0TfigunZNBX-OFihXcCpBtNk" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.hoverflow.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/qod.js"></script>

</head>

<body <?php body_class(); ?>>

	<div id="page-wrap">

		<div id="left-col">

			<h1><a href="/">Quotes <span>on</span> Design</a></h1>

			<ul>
				<li id="another"><a href="/">Get Another! <img id="spinner" src="/images/ajax-loader.gif" alt="" /></a><div></div></li>
				<li id="archive"><a href="/archive/">Archives</a><div></div></li>
				<li id="rssfeed"><a href="http://feeds2.feedburner.com/QuotesOnDesign">RSS Feed</a><div></div></li>
				<li id="api"><a href="/the-api/">The API</a><div></div></li>
				<li id="widgets"><a href="/widgets/">Widgets</a><div></div></li>
				<li id="gotone"><a id="submit-toggle" href="/submit/">Got one?</a><div></div></li>
			</ul>

			<form action="http://quotesondesign.com/search/" id="cse-search-box">
			  <div>
			    <input type="hidden" name="cx" value="008634746982114956312:4adkj69x1og" />
			    <input type="hidden" name="cof" value="FORID:11" />
			    <input type="hidden" name="ie" value="UTF-8" />
			    <input type="text" name="q" size="31" id="textField" />
			    <input type="submit" name="sa" value="Search" />
			  </div>
			</form>

			<script src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>

		</div>

		<div id="right-col">