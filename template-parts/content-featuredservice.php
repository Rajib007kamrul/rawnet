<?php
    $args = array(
        'post_type'  => 'service',
        'posts_per_page' => 3,
    );

    $query =  new WP_Query( $args );
    $i = 0;
    if( $query->have_posts() ):
        echo '<div class="section capable-area"> <div class="container"> <div class="row">';
        while( $query->have_posts() ) : $query->the_post();
            global $post;
            if( $i == 0 ) {
                $customattribute = 'data-from="-50px" data-to="30px"';
            }
            if( $i == 1 ) {
                $customattribute = 'data-from="125px" data-to="30px"';
            }
            if( $i == 2 ) {
                $customattribute = 'data-from="-50px" data-to="30px"';
            }
?>
            <div class="col-lg-4">
                <a href="<?php the_permalink(); ?>" class="card parallax-ty" data-behaviour="parallax" <?php echo esc_attr( $customattribute; ) ?>>
                    <div class="card-main" data-entrance>
                        <div class="card-heading heading-underline wysiwyg wysiwyg-heading">
                            <p> <?php echo get_the_title(); ?> <span class="u-white-space-nowrap">Growth<span class="u-ff-serif a-bounce u-color-brand">.</span></span>
                            </p>
                        </div>
                        <div class="card-copy">
                            <p> <?php echo wp_trim_words( get_the_content(), 10 );  ?>  </p>
                        </div>

                        <span class="card-button button">More on how we could help your business grow</span>
                    </div>
                </a>
            </div>
<?php
    $i++;
    endwhile;
    echo '</div></div></div>';
    endif;
?>
