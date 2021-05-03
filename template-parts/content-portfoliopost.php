<?php
    global $post;
    $portfolio_cats = wp_get_post_terms( $post->ID, 'portfolio_cat', array( 'fields' => 'names' ) );
?>
<div class="col-lg-6" id="post-<?php the_ID(); ?>">
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
                <p> <?php echo get_the_title(); ?> <span class="u-color-brand">.</span></p>
            </div>
            <div class="card-sub-heading">
                <p> <?php
                $portfolio_content = apply_filters( 'the_content', get_the_content() );
                echo wp_trim_words( $portfolio_content, 5 ); ?> </p>
            </div>
            <div class="card-copy">
                <p>Abi Speakman, Marketing Manager</p>
            </div>
        </div>
    </a>
</div>