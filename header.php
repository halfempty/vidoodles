<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php 
		wp_title( '&mdash;', true, 'right' );
		bloginfo( 'name' ); 
		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' &mdash; ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?></title>

		<meta name="viewport" content="initial-scale=1.0, width=device-width" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
	    <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/homescreen.png">
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" /> 

		<script type="text/javascript" src="//use.typekit.net/wnv7wge.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
		<?php wp_head(); ?>

</head>
<body>
<div class="page">	
	<div id="content">
		
		<div id="header">

			<div class="title">
			<h1><a href="<?php bloginfo('url'); ?>">Vidoodles</a></h1>

			<?php if ( is_front_page() || $post->post_parent == get_ID_by_slug('kicking-around') ) : ?>
				<h2>Kicking Around</h2>
			<?php elseif ( $post->post_parent == get_ID_by_slug('classifieds') ) : ?>
				<h2><a href="/classifieds">The Classifieds</a></h2>
			<?php endif; ?>

			</div>

			<?php if ( !is_page('guestbook') ) : ?>
				<div class="guestbook">
				<a href="http://vidoodles.com/classifieds/guestbook/">Guestbook</a>
				</div>

				<?php if ( is_front_page() ) : ?>
					<?php
					$kickingaroundid = get_ID_by_slug('kicking-around'); 

					$args = array(
						'child_of' => $kickingaroundid,
						'sort_column' => 'menu_order',
						'sort_order' => 'desc',
						'post_type' => 'page',
						'post_status' => 'publish'
					); 
					$pages = get_pages($args); 

					$permalink = get_permalink( $pages[1]->ID );
					?>

					<div class="previous"><a href="<?php echo $permalink; ?>">Previous video</a></div>
				<?php else :?>
					<?php next_link(); ?>
					<?php previous_link(); ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>