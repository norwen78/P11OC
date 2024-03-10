<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <a>
                            <div class="entry-content">
                                <div class="overlay">
                                    <div class="overlay-fond"></div>

                                    <img
                                        data-id="<?php the_ID(); ?>"
                                        class="fullscreen lightbox-trigger" 
                                        id="lightbox-open"
                                        src="<?php echo get_stylesheet_directory_uri() . '/assets/fullscreen.png'; ?>" 
                                        alt=""
                                    >


                                <div class="overlay-category">
                                <?php
                                    // Récupère et affiche la catégorie de la photo
                                    $terms = get_the_terms(get_the_ID(), 'categorie');
                                    if ($terms && !is_wp_error($terms)) {
                                        echo '';
                                        foreach ($terms as $term) {
                                            echo $term->name . ' ';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="overlay-title"><?php the_title(); ?></div>
                                <a href="<?php the_permalink(); ?>" class="eye">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/eye.png'; ?>" alt="">
                                </a>
                                </div>
                                <?php
                                // Affichez l'image mise en avant
                                if (has_post_thumbnail()) :
                                ?>
                                    <div class="featured-image">
                                        <?php the_post_thumbnail('full'); // Vous pouvez spécifier la taille de l'image ?>                                        
                                    </div>
                                <?php
                                endif;
                                ?>
                            </div>                           
                        </a>
                        
                        <? get_template_part("template-part/lightbox") ?>
                    </article>
                    