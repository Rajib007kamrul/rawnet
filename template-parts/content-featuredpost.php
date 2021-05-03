<?php

  $args = array(
    'post_type'  => 'post',
    'posts_per_page' => 1,
    'meta_query' => array(
      array(
        'key'     => 'is_post_featured',
        'value'   => '1'
      ),
    ),
  );
    $featured_post_query =  new WP_Query( $args );

    if( $featured_post_query->have_posts() ):
        while( $featured_post_query->have_posts() ) : $featured_post_query->the_post();
            global $post;
            $cats = wp_get_post_terms( $post->ID, 'category', array( 'fields' => 'names' ) );
?>

<div class="section ">
    <div class="container">
        <a href="<?php the_permalink();?>" class="card card--with-media">
            <div class="card-media" data-entrance>
                <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'rawnet_thumbnail', [ 'class' => 'w-100' ] );
                    }
                ?>
            </div>
            <div class="card-main style-two" data-entrance>
                <ul class="tags">  <?php echo "<li class='tags-item'> <span class='tag'>" . implode("</span></li><li class='tags-item'> <span class='tag'>", $cats) . "</span></li>"; ?> </ul>
                <div class="card-heading heading-underline wysiwyg wysiwyg-heading">
                    <p> <?php the_title(); ?> <span class="u-ff-serif a-bounce u-color-brand">.</span></p>
                </div>
                <div class="author">
                    <?php
                        $user = get_the_author_meta( 'ID' );
                        if ( $user ) :
                    ?>
                        <img class="author__img" width="48" height="48" src="<?php echo esc_url( get_avatar_url( $user, 48 ) ); ?>" />
                    <?php endif; ?>
                    <div class="author__caption">
                        <span class="author__name"> <?php echo get_the_author_meta( 'nicename', $user ); ?> </span>
                        <span class="author__title"> <?php echo get_the_author_meta( 'designation', $user ); ?> </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<?php
            endwhile;
        else:
            get_template_part( 'template-parts/content', 'none' );
        endif;
?>
