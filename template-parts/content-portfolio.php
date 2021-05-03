<?php
    $paged           = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $posts_per_page  = !empty( get_option( 'posts_per_page' ) ) ? get_option( 'posts_per_page' ) : 3;
    $args            = array (
        'post_type'      => 'portfolio',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged
    );
    $portfolio_query =  new WP_Query( $args );

    if( $portfolio_query->have_posts() ):
        echo ' <div class="section "> <div class="container"> <div class="row">';
        while( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
        get_template_part( 'template-parts/content', 'portfoliopost' );
    endwhile;
        wp_reset_postdata();
        echo ' </div> </div> </div>';
     endif;

    if( $portfolio_query->max_num_pages > 1 ) {
        jagmit_paging_nav($portfolio_query->max_num_pages);
    }
?>