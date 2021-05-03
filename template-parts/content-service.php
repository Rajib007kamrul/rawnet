<?php
    $args = array(
        'post_type'  => 'service',
        'posts_per_page' => -1,
    );

    $query =  new WP_Query( $args );

    if( $query->have_posts() ):
        while( $query->have_posts() ) : $query->the_post();
            global $post;
            $service_cats    = wp_get_post_terms( $post->ID, 'service_cat', array( 'fields' => 'names' ) );
            $service_lists   = get_post_meta( $post->ID, 'capability_repeat_fields', true );
            $heading         = get_post_meta( $post->ID, 'service_heading', true );
            $subheading      = get_post_meta( $post->ID, 'service_subheading', true );
            $note            = get_post_meta($post->ID, 'service_note', true);
            $brand_partner   = get_post_meta( $post->ID, 'brand_partner', true );
            $service_btn_txt = get_post_meta( $post->ID, 'service_btn_txt', true );
?>

    <div class="section" id="post-<?php the_ID(); ?>"  data-entrance>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <svg viewBox="0 0 450 50" class="section-bg-svg section-bg-svg--top">
                        <text y="60" x="0" text-anchor="start" class="section-bg-text a-stroke-dash">#1</text>
                    </svg>
                    <div class="heading-2  wysiwyg wysiwyg-heading u-mb">
                        <p> <?php echo get_the_title(); ?> <span class="u-white-space-nowrap">Design<span class="u-ff-serif a-bounce u-color-brand">.</span></span>
                        </p>
                    </div>
                    <div class="heading-6  wysiwyg wysiwyg-heading">
                        <p>
                            <?php
                                $service_content = apply_filters( 'the_content', get_the_content() );
                                echo wp_trim_words( $service_content, '20' );
                            ?>
                        </p>
                    </div>
                    <div class="hr"></div>
                    <div class="wysiwyg wysiwyg-block u-mb">
                        <ul>
                            <?php foreach ($service_lists as $service_list ) {
                                echo '<li>'. $service_list .'</li>';
                            } ?>
                        </ul>
                    </div>
                    <a href="<?php the_permalink();  ?>" class="button button-off-page button--brand">
                        <?php echo $service_btn_txt; ?>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="<?php the_permalink();  ?>" class="card card--with-media">
                        <div class="card-media" data-entrance>
                            <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'rawnet_thumbnail' );
                                }
                            ?>
                        </div>
                        <div class="card-main" data-entrance>
                            <ul class="tags">  <?php echo "<li class='tags-item'> <span class='tag'>" . implode("</span></li><li class='tags-item'> <span class='tag'>", $service_cats) . "</span></li>"; ?> </ul>
                            <div class="card-heading heading-underline wysiwyg wysiwyg-heading">
                                <p> <?php echo $heading; ?> </p>
                             <!--    <p>Sharps <span class="u-white-space-nowrap">Bedrooms<span class="u-ff-serif a-bounce u-color-brand">.</span></span>
                                </p> -->
                            </div>
                            <div class="card-sub-heading">
                                <p> <?php echo $subheading; ?> </p>
                            </div>
                            <div class="card-copy">
                                <!-- <span class="u-color-brand">Outcome</span>:&nbsp;A 36% increase in design visit requests! -->
                                <p> <?php echo $note; ?> </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
        endwhile;
     endif;
?>