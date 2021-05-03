<?php
    $args = array(
        'post_type'  => 'partner',
        'posts_per_page' => 10,
    );

    $query =  new WP_Query( $args );
    if( $query->have_posts() ):
        echo '<div class="section partner-area"> <div class="partner-carousel owl-carousel">';
        while( $query->have_posts() ) : $query->the_post();
            global $post;
            $partner_extra_image = get_post_meta( $post->ID, 'partner_extra_image_id', true );
            if(  !empty( $partner_extra_image ) ) {
                $featured_second_img_url = wp_get_attachment_url( $partner_extra_image, 'full' );
            }
?>
    <div class="item">
        <a href="#" class="single-partner">
            <div class="thumb">
                <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'thumbnail', [ 'class' => 'p-main-img' ] );
                    }

                    if(  !empty( $partner_extra_image ) ) {
                        $featured_second_img_url = wp_get_attachment_url( $partner_extra_image, 'full' );
                        echo '<img class="p-active-img" src="'. esc_attr( $featured_second_img_url ) .'" alt="partner">';
                 } ?>
            </div>
            <div class="details">
                <p> <?php echo get_the_title(); ?> </p>
            </div>
        </a>
    </div>

    <?php
        endwhile;
            echo '</div></div>';
        endif;
    ?>
