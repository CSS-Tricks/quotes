<!DOCTYPE html>
<html lang="en">

<head>

	<title><?php wp_title(); ?></title>

	<?php if (is_search()) : ?>
		<meta name="robots" content="noindex, nofollow">
	<?php endif; ?>

	<meta name="google-site-verification" content="dNQlo36DPX8fNXWCQzB0TfigunZNBX-OFihXcCpBtNk">

	<meta name="viewport" content="width=device-width">

	<link href="https://fonts.googleapis.com/css?family=Lora|Raleway:300,400,700" rel="stylesheet">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="page-wrap">

		<h1><a href="/">Quotes<br><span class="italics">on</span> <span class="bigger">Design</span></a></h1>