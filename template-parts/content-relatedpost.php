<?php
    $args = array(
        'category__in' => wp_get_post_categories( get_the_ID() ),
        'post_type'  => 'post',
        'posts_per_page' => 2,
        'post__not_in' => array ( get_the_ID() ),
    );

    $query =  new WP_Query( $args );

    if( $query->have_posts() ):
        echo '<div class="section "> <div class="container"> <div class="row">';
        while( $query->have_posts() ) : $query->the_post();
            get_template_part( 'template-parts/content', 'post' );
        endwhile;
        echo '</div> </div> </div>';
    endif;
?>

