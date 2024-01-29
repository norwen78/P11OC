<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <div class="entry-content">
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
                        

                    </article>
                    