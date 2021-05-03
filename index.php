<?php get_header();
    global $wp_query;
?>

    <div class="page ccm-page page-type-page page-template-home">
        <!-- main content area start -->
        <div class="main u-bg-concrete">

            <div class="u-pos-rel">
                <svg width="1600px" viewBox="0 0 1600 5027" xmlns="http://www.w3.org/2000/svg" class="background background--concrete background--default" data-element="background-height">
                    <polygon points="0,1609 1600,9 1600,3548 0,5148"></polygon>
                </svg>
            </div>

            <!-- Banner area start -->
            <div class="banner banner-no-image" data-entrance>
                <div class="banner-under">
                    <div class="container container-huge u-ph0@small">
                        <figure class="banner-media">
                            <svg width="1344px" height="520" class="banner-svg banner-svg--half-up" viewBox="0 0 1344 520" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g class="banner-stripe-container" transform=" rotate(45 1150 500)">
                                    <rect class="banner-rect banner-rect-1" fill="#3aafa9" x="170" y="0" width="121" height="815"></rect>
                                    <rect class="banner-rect banner-rect-2" fill="#3aafa9" x="301" y="0" width="81" height="920"></rect>
                                    <rect class="banner-rect banner-rect-3" fill="#3aafa9" x="392" y="0" width="219" height="980"></rect>
                                    <rect class="banner-rect banner-rect-4" fill="#3aafa9" x="621" y="0" width="242" height="820"></rect>
                                    <rect class="banner-rect banner-rect-5" fill="#3aafa9" x="873" y="0" width="81" height="720"></rect>
                                </g>
                            </svg>
                        </figure>
                    </div>
                </div>
            </div>
            <!-- banner area end -->

            <!-- Determined area start -->
            <div class="section ">
                <div class="container">
                    <div class="row">
                        <?php
                            if ( have_posts() ) :
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content', 'post' );
                                endwhile;
                            endif;
                        ?>
                    </div>
                </div>
            </div>

            <?php
                if( $wp_query->max_num_pages > 1 ) {
                    jagmit_paging_nav($wp_query->max_num_pages);
                }
            ?>
        </div>
        <!-- main content area end -->

<?php get_footer(); ?>