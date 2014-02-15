<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

			<?php if ( is_page('guestbook') ) : ?>
				<div class="text">
				<?php the_content(); ?>
				<?php comments_template(); ?>
				</div>
			<?php elseif ( is_front_page() ) : 

				$kickingaroundid = get_ID_by_slug('kicking-around'); 

				$args = array(
					'child_of' => $kickingaroundid,
					'sort_column' => 'menu_order',
					'sort_order' => 'desc',
					'post_type' => 'page',
					'post_status' => 'publish'
				); 
				$pages = get_pages($args); 

				 makeVideo($pages[0]->ID,true); 
				
				wp_reset_query();

			else : 
					 makeVideo("$post->ID",true); 
			endif; 
 ?>

		<?php endwhile; ?>
	<?php else : ?>
		<p>Page not found.</p>
	<?php endif; ?>

<?php get_footer(); ?>