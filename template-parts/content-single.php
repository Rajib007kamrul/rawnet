<?php
	$user = get_the_author_meta( 'ID' );
?>
            <div class="section section--compact  mt-lg-0 mt-5">
                <div class="container container--large">
                    <h1 class="heading--2"> <?php the_title();  ?> </h1>
                    <div class="flex flex--align-end">
                        <div class="flex__item flex__item--grow">
                            <div class="author author--bigger">
								<img class="author__img" width="48" height="48" src="<?php echo esc_url( get_avatar_url( $user, 48 ) ); ?>" />
                                <div class="author__caption">
                                    <span class="author__name"> <?php echo get_the_author_meta( 'nicename', $user ); ?>  </span>
                                    <span class="author__title"> <?php echo get_the_author_meta( 'designation', $user ); ?>  </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex__item">
                            <div class="share">
                                <p class="share__text">1 month ago &nbsp; |
                                    &nbsp; 5 minute read</p>
                                <button class="button-icon button-icon--round" data-behaviour="toggle-class" data-blur="true" data-target="share-modal">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/icon/social-share.svg'; ?>" alt="Share this page" class="share__icon" width="44" height="44">
                                </button>
                                <aside data-element="share-modal" class="share__modal" data-class="share__modal--active">
                                    <ul class="share__list">
                                        <li class="share__item">
                                            <a href="#" class="share__link">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/icon/1.svg'; ?>" alt="Rawnet LinkedIn" class="share__icon" width="44" height="44">
                                            </a>
                                        </li>
                                        <li class="share__item">
                                            <a href="#" class="share__link">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/icon/2.svg'; ?>" alt="Rawnet LinkedIn" class="share__icon" width="44" height="44">
                                            </a>
                                        </li>
                                        <li class="share__item">
                                            <a href="#" class="share__link">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/icon/3.svg'; ?>" alt="Rawnet LinkedIn" class="share__icon" width="44" height="44">
                                            </a>
                                        </li>
                                        <li class="share__item">
                                            <a href="#" class="share__link">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/icon/4.svg'; ?>" alt="Rawnet LinkedIn" class="share__icon" width="44" height="44">
                                            </a>
                                        </li>
                                    </ul>
                                </aside>
                            </div>
                        </div>
                    </div>
                    <hr class="hr">
                </div>
            </div>

            <div class="section ">
                <div class="container ">
                    <div class="wysiwyg">
                        <?php  the_content(); ?>
                    </div>
                </div>
            </div>

            <?php get_template_part( 'template-parts/content', 'relatedpost' ) ?>