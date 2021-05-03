<!-- Determined area start -->
<div class="section ">
    <div class="container">
        <div class="row">
    <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $posts_per_page  = !empty( get_option( 'posts_per_page' ) ) ? get_option( 'posts_per_page' ) : 3;
        $args = array(
            'post_type'  => 'post',
            'posts_per_page' => $posts_per_page,
            'paged' => $paged
        );

        $query =  new WP_Query( $args );

        if( $query->have_posts() ):
            while( $query->have_posts() ) : $query->the_post();
                global $post;
                get_template_part( 'template-parts/content', 'post' );
            endwhile;
        else:
            get_template_part( 'template-parts/content', 'none' );
        endif;
    ?>
        </div>
    </div>
</div>
<!-- Determined area End -->

<?php
    if( $query->max_num_pages > 1 ) {
        jagmit_paging_nav($query->max_num_pages);
    }
?>
