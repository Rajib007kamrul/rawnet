<?php get_header(); ?>

<div class="page ccm-page">
    <!-- main content area start -->
    <main class="main">

		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'visgo' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
		<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'post' );
				endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
		?>

	</main>

<?php get_footer(); ?>