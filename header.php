<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body data-element="body">
    <?php
        $logo       = get_theme_mod( 'logo_upload' );
        $logo_black = get_theme_mod( 'logo_black_upload' );
    ?>
	    <!-- navbar area start -->
    <div class="menu" data-element="menu">
        <header class="header">
            <div class="u-fade@scroll+0">
                <?php if( is_home() || is_front_page() ) { ?>
                <a class="header-logo-link" href="<?php echo home_url('/'); ?>"><img src="<?php echo $logo; ?>" alt="img"></a>

                 <?php } else { ?>
 <a class="header-logo-link" href="<?php echo home_url('/'); ?>"><img src="<?php echo $logo_black; ?>" alt="img"></a>
                 <?php } ?>
            </div>
            <button class="burger" data-behaviour="menu-toggle">
                <span class="burger-ham">
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                </span>
                <span class="burger-cross">
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                </span>
                <span class="sr-only">open/close nav</span>
            </button>
        </header>
        <div class="menu-background"></div>

        <!-- menu list start -->
        <div class="menu-container">
                <?php
                if( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location'  => 'primary',
                        'container'       => 'nav',
                        'container_class' => 'menu-nav',
                        'link_before'     => '<span class="menu-text" aria-hidden="true">',
                        'link_after'      => '</span>',
                        'items_wrap'      => '<ul id = "%1$s" class = "menu-list %2$s">%3$s</ul>'
                    ) );
                }
                ?>
<!--             <nav class="menu-nav">
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="about.html" class="menu-link">
                            <span class="menu-hover">About</span>
                            <span class="menu-text" aria-hidden="true">About</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="capabilities.html" class="menu-link">
                            <span class="menu-hover">Capabilities</span>
                            <span class="menu-text" aria-hidden="true">Capabilities</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="our-work.html" class="menu-link">
                            <span class="menu-hover">Our Work</span>
                            <span class="menu-text" aria-hidden="true">Our Work</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="careers.html" class="menu-link">
                            <span class="menu-hover">Careers</span>
                            <span class="menu-text" aria-hidden="true">Careers</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="insights.html" class="menu-link">
                            <span class="menu-hover">Insights</span>
                            <span class="menu-text" aria-hidden="true">Insights</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="contact.html" class="menu-link">
                            <span class="menu-hover">Contact</span>
                            <span class="menu-text" aria-hidden="true">Contact</span>
                        </a>
                    </li>
                </ul>
            </nav> -->
           <!--  <div class="header-cta">
                <div class="header-cta-heading heading-4 heading-underline heading-light">
                    <p>Adapt, Don't Stop.</p>
                </div>
                <div class="header-cta-copy">
                    <p>A hub of ideas, advice and support for everyone in the digital &amp; marketing community during this pressing time. We want to help you adapt, not stop.</p>
                </div>
                <a class="button" href="#">Start Adapting</a>
            </div> -->
        </div>
    </div>
    <!-- navbar area end -->