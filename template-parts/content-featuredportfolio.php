<?php
    $args = array(
        'post_type'      => 'portfolio',
        'posts_per_page' => 2,
    );
    $query =  new WP_Query( $args );
    $i =0;
    if( $query->have_posts() ):
        echo '<div class="section work-area"> <div class="container"> <div class="row">';
        while( $query->have_posts() ) : $query->the_post();
            global $post;
            $portfolio_cats = wp_get_post_terms( $post->ID, 'portfolio_cat', array( 'fields' => 'names' ) );
?>

<div class="col-lg-6 <?php if ( $i ==0 ) { echo 'mb-5'; } ?>">
    <?php if ( $i ==0 ) { ?>
    <div class="heading-2  wysiwyg wysiwyg-heading u-mb ">
        <h2> <?php echo get_theme_mod( 'portfolio_title' ); ?> <span class="u-white-space-nowrap">Work<span class="u-ff-serif a-bounce"><span class="u-color-brand">.</span></span>
            </span>
        </h2>
    </div>
    <div class="heading-6 u-mb-40  wysiwyg wysiwyg-block  ">
        <p> <?php echo get_theme_mod( 'portfolio_description' ); ?> </p>
    </div>
<?php } ?>
    <a href="<?php the_permalink(); ?>" class="card card--with-media">
        <figure class="card-media" data-entrance>
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'rawnet_thumbnail', [] );
                }
            ?>
        </figure>
        <div class="card-main" data-entrance>
            <ul class="tags">
              <?php echo "<li class='tags-item'> <span class='tag'>" . implode("</span></li><li class='tags-item'> <span class='tag'>", $portfolio_cats) . "</span></li>"; ?>
            </ul>
            <div class="card-heading heading-underline wysiwyg wysiwyg-heading">
                <h3> <?php echo get_the_title(); ?>  <span class="u-white-space-nowrap">Media<span class="u-ff-serif a-bounce u-color-brand">.</span></span>
                </h3>
            </div>
            <div class="card-sub-heading">
                <p>
                    <?php
                        $portfolio_content = apply_filters( 'the_content', get_the_content() );
                        echo wp_trim_words( $portfolio_content, 5 );
                    ?>
                </p>
            </div>
            <div class="card-copy">
                <p>A new proposition, website &amp; martech enabling ITV Media to optimise their customer experience and drive better quality leads.</p>
            </div>
        </div>
    </a>
</div>
<?php
        $i++;
        endwhile;
        echo '</div></div></div>';
    endif;
?>
