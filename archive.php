<?php get_header(); ?>

 <div class="page ccm-page">
    <!-- main content area start -->
    <main class="main">
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					// get_template_part( 'template-parts/content', 'post' );
				endwhile;
			else :
				// get_template_part( 'template-parts/content', 'none' );
			endif;
		?>
	</main>


<?php get_footer(); ?>