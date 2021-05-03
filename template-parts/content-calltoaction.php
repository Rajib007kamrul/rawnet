 <?php
    $link = get_theme_mod('callaction_link');
 ?>
    <div class="banner banner-cta" data-entrance data-root-margin="-20%">
        <div class="banner-under">
            <figure class="banner-media">
                <svg viewBox="0 0 1117 744" class="banner-svg" width="1117" height="744">
                    <defs>
                        <clipPath id="banner-clip--cta" class="banner-stripe-container" transform="rotate(45 400 480)">
                            <rect class="banner-rect banner-rect-1" x="-20" y="215" width="96" height="765"></rect>
                            <rect class="banner-rect banner-rect-2" x="96" y="157" width="131" height="956"></rect>
                            <rect class="banner-rect banner-rect-3" x="237" y="-45" width="252" height="1292"></rect>
                            <rect class="banner-rect banner-rect-4" x="519" y="15" width="229" height="1111"></rect>
                            <rect class="banner-rect banner-rect-5" x="768" y="260" width="111" height="624"></rect>
                        </clipPath>
                    </defs>
                    <foreignObject x="0" y="0" height="100%" width="100%">
                        <picture >
                            <source srcset="data:image/svg+xml,%3Csvg%20width%3D%271117%27%20height%3D%27992%27%20viewBox%3D%270%200%201117%20992%27%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%3E%3Crect%20x%3D%270%27%20y%3D%270%27%20width%3D%271117%27%20height%3D%27992%27%20rx%3D%275%27%20ry%3D%275%27%20fill%3D%27transparent%27%20%2F%3E%3C%2Fsvg%3E"
                            data-src="https://d2c1uap9jjtsxz.cloudfront.net/1117x992/jpg/3415/8376/4954/Office-105.webp 1x, https://d2c1uap9jjtsxz.cloudfront.net/2234x1984/jpg/3415/8376/4954/Office-105.webp 2x" type="image/webp">

                            <source srcset="data:image/svg+xml,%3Csvg%20width%3D%271117%27%20height%3D%27992%27%20viewBox%3D%270%200%201117%20992%27%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%3E%3Crect%20x%3D%270%27%20y%3D%270%27%20width%3D%271117%27%20height%3D%27992%27%20rx%3D%275%27%20ry%3D%275%27%20fill%3D%27transparent%27%20%2F%3E%3C%2Fsvg%3E"
                            data-src="https://d2c1uap9jjtsxz.cloudfront.net/1117x992/3415/8376/4954/Office-105.jpg 1x, https://d2c1uap9jjtsxz.cloudfront.net/2234x1984/3415/8376/4954/Office-105.jpg 2x" type="image/jpeg">
                            <img class="banner-img banner-clip" data-lazyload="image" loading="lazy" src="<?php echo get_template_directory_uri() .'/assets/img/bg/Office-105.png';?>" alt="img"/>
                        </picture>
                    </foreignObject>
                    <image xlink:href="<?php echo get_template_directory_uri() .'/assets/img/bg/Office-105.png'; ?>" height="100%" width="100%" x="0" y="0" class="banner-img banner-clip banner-fallback" />
                </svg>
            </figure>
        </div>
        <div class="banner-over">
            <div class=" container container-wide">
                <div class="banner-copy">
                    <div class="banner-heading wysiwyg heading-1">
                        <h2><span class="heading-1"><span class="u-color-white">
                            <?php echo get_theme_mod('callaction_title'); ?> </span><span class="u-white-space-nowrap"><span class="u-color-white">experts</span><span class="u-ff-serif a-bounce u-color-secondary">.</span></span>
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-bottom ">
            <div class="container container-wide">
                <div class="banner-copy a-slide-left">
                    <a href="<?php echo esc_url( get_permalink( $link ) );  ?>" class="button button-off-page">Get to know us</a>
                </div>
            </div>
        </div>
    </div>