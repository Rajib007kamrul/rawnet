    <!-- footer area start -->
    <footer class="footer">
        <div class="container">
            <?php $email = get_theme_mod( 'email_section' ); ?>
            <a href="mailto:<?php echo esc_attr( $email ); ?>" class="footer-email">
                <span class="u-color-brand">hello</span>@Vivify<span class="u-color-brand u-ff-serif">.</span>com
            </a>
            <div>
                <a class="footer-number mb-3" href="#"> <?php echo esc_attr( get_theme_mod( 'phone_section' ) ); ?></a>
            </div>
            <?php
                    wp_nav_menu( array(
                        'theme_location'  => 'footer',
                        'menu'            => '',
                        'container'       => 'nav',
                        'container_class' => 'footer-nav',
                        'items_wrap'      => '<ul class = "footer-list">%3$s</ul>',
                    ) );

                    $fb_section         =  esc_url( get_theme_mod( 'fb_section' ) );
                    $twitter_section    =  esc_url( get_theme_mod( 'twitter_section' ) );
                    $instragram_section =  esc_url( get_theme_mod( 'instragram_section' ) );
                    $linkedin_section   =  esc_url( get_theme_mod( 'linkedin_section' ) );
                    $copyright_section  =  esc_url( get_theme_mod( 'copyright_section' ) );
            ?>
            <ul class="social">
                <li class="social-item">
                    <a href="<?php echo esc_url( $linkedin_section ); ?>" class="social-link" target="_blank">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/social/social-linkedin.svg'); ?>" alt="LinkedIn" class="social-icon">
                    </a>
                </li>
                <li class="social-item">
                    <a href="<?php echo esc_url($twitter_section); ?>" class="social-link" target="_blank">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/social/social-twitter.svg'); ?>" alt="Twitter" class="social-icon">
                    </a>
                </li>
                <li class="social-item">
                    <a href="<?php echo esc_url($instragram_section); ?>" class="social-link" target="_blank">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/social/social-instagram.svg'); ?>" alt="instagram" class="social-icon">
                    </a>
                </li>
                <li class="social-item">
                    <a href="<?php echo esc_url($fb_section); ?>" class="social-link" target="_blank">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/social/social-facebook.svg') ?>" alt="facebook" class="social-icon">
                    </a>
                </li>
            </ul>
            <p class="footer-copyright"> <?php echo $copyright_section; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> </p>
            <p class="footer-copyright">Vivify Ltd. 39 - 51 High St, Ascot, Berkshire, SL5 7HY.</p>
            <nav class="footer-nav footer-nav--small">
                <ul class="footer-list u-mt-half">
                    <li class="footer-list-item">
                        <a href="privacy-policy.html" class="footer-list-link">Privacy policy</a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
    <!-- footer area start -->
</div>
<?php wp_footer(); ?>
	</body>
</html>