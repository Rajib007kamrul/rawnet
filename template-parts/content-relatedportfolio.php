<?php
    $args = array(
        'post_type'  => 'portfolio',
        'posts_per_page' => 2
    );

    $query =  new WP_Query( $args );

    if( $query->have_posts() ):
        $i = 0;
        echo '<div class="section section--bg-rose section--rose-slant"> <div class="container"> <div class="row">';
        while( $query->have_posts() ) : $query->the_post();
            global $post;
            $portfolio_cats = wp_get_post_terms( $post->ID, 'portfolio_cat', array( 'fields' => 'names' ) );
?>
                        <div class="col-lg-6" id="post-<?php the_ID(); ?>">
                            <?php if( $i ==0 ) { ?>
                            <div class="heading--2  wysiwyg wysiwyg--heading u-mb u-color-white">
                                <p>Recent Projects</p>
                            </div>
                            <div class="heading--6 u-mb-40  wysiwyg wysiwyg--block  u-color-white">
                                <p>Have a browse through some of our latest digital strategy projects</p>
                            </div>
                        <?php } ?>
                            <a href="<?php the_permalink();  ?>" class="card card--with-media">
                                <div class="card-media" data-entrance>
                                    <?php
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'rawnet_thumbnail', [ 'class' => "w-100" ] );
                                        }
                                    ?>
                                </div>
                                <div class="card-main" data-entrance>
                                    <ul class="tags">  <?php echo "<li class='tags-item'> <span class='tag'>" . implode("</span></li><li class='tags-item'> <span class='tag'>", $portfolio_cats) . "</span></li>"; ?> </ul>
                                    <div class="card-heading heading-underline wysiwyg wysiwyg-heading">
                                        <p> <?php the_title(); ?> <span class="u-ff-serif a-bounce u-color-brand">.</span></p>
                                    </div>
                                    <div class="card-sub-heading">
                                        <p> <?php the_content(); ?> </p>
                                    </div>
                                </div>
                            </a>
                        </div>

<?php
        $i++;
        endwhile;
        echo '</div> </div> </div>';
    endif;
?>
