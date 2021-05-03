<?php get_header(); ?>
    <div class="page ccm-page " data-behaviour="page">
        <main class="main">
        <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
        ?>
            <!-- banner area start -->
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
                <div class="banner-over">
                    <div class="banner-container container container-large">
                        <div class="banner-copy">
                            <div class="banner-heading wysiwyg heading-1">
                                <h1> <?php the_title(); ?> <span class="u-ff-serif a-bounce u-color-brand">.</span></h1>
                            </div>
                            <div class="banner-text wysiwyg ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner area end -->

            <!-- privacy area end -->
            <div class="section ">
                <div class="container container-small">
                    <div class="wysiwyg">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        <?php
                endwhile;
            endif;
        ?>
        </main>
<?php get_footer(); ?>