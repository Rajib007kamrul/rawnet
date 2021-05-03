<?php
    $args = array(
        'post_type'  => 'team',
        'posts_per_page' => -1,
    );
    $query =  new WP_Query( $args );
    if( $query->have_posts() ):
        echo '<div class="section leadership-area"> <div class="container"> <div class="row">';
        while( $query->have_posts() ) : $query->the_post();
            global $post;
    $team_cats = wp_get_post_terms( $post->ID, 'team_cat', array( 'fields' => 'names' ) );

?>
<div class="col-lg-4 col-md-6">
    <div class="u-mb-130@min-large u-mb-double">
        <div class="card card--with-media parallax-ty " data-entrance data-behaviour="parallax" data-from="75px" data-to="75px">
            <div class="card-media" data-entrance>
                <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'rawnet_team_thumbnail' );
                    }
                ?>
            </div>
            <div class="card-main" data-entrance>
                <ul class="tags">  <?php echo "<li class='tags-item'> <span class='tag'>" . implode("</span></li><li class='tags-item'> <span class='tag'>", $team_cats) . "</span></li>"; ?> </ul>
                <div class="card-heading heading-underline wysiwyg wysiwyg-heading">
                    <p><?php echo get_the_title();  ?> <span class="u-white-space-nowrap">Crooke<span class="u-ff-serif a-bounce"><span class="u-color-brand">.</span></span>
                        </span>
                    </p>
                </div>
                <div class="card-sub-heading">
                    <p> <?php echo get_post_meta( $post->ID, 'team_designation', true ); ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        endwhile;
        echo '</div></div></div>';
    endif;
?>
