            <div class="section" data-entrance>
                <svg viewBox="0 0 450 50" class="section-bg-svg">
                    <text y="50" x="50%" text-anchor="middle" class="section-bg-text a-stroke-dash">Dedication</text>
                </svg>
                <div class="container">
                    <div class="row">
                        <?php
                            $next = get_adjacent_post( false, '', false);
                            if( $next ) {
                                $url = get_permalink( $next->ID );
                        ?>
                        <div class="col-lg-6 u-pb-120@min-large mb-5 mb-lg-0">
                            <div class="heading--2 u-mb wysiwyg wysiwyg--heading u-mb-double">
                                <p>Next Project</p>
                            </div>
                            <div class="a-slide-left">
                                <?php  echo '<a href="' . esc_url($url) . '"  class="button button--brand button-off-page u-mt a-slide-left"
                                >'. esc_attr($next->post_title) .'</a>'; ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php
                        $args            = array( 'post_type'  => 'portfolio', 'posts_per_page' => 1,
                            'post__not_in' => array ( get_the_ID() ), );
                        $portfolio_query =  new WP_Query( $args );
                        if( $portfolio_query->have_posts() ):
                            while( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
                                get_template_part( 'template-parts/content', 'portfoliopost' );
                            endwhile;
                                wp_reset_postdata();
                        endif;
                    ?>
                    </div>
                </div>
            </div>