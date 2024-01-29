<?php
get_header(); // Ajoutez le code d'en-tête standard de WordPress
?>
<? get_template_part("template-part/modale") ?>
<div id="primary" class="single-post-container">
    <main id="main" class="post-content">

        <?php
        // Commencez la boucle WordPress
        while (have_posts()) :
            the_post();
        ?>

        <div class="first-section">

        <div class="title_ref">

            <div class="title">
                <!-- Affiche le titre de la photo -->
                <h1 class="post-title line-break-title"><?php the_title(); ?></h1>
            </div>

            <div class="ref">

                <div class="post-reference">
                    <?php
                    // Récupère et affiche la référence de la photo//
                    $reference = get_field('reference');
                    if ($reference) {
                        echo 'Référence : ' . $reference;
                    }
                    ?>
                </div>

                <div class="photo-category">
                    <?php
                    // Récupère et affiche la catégorie de la photo
                    $terms = get_the_terms(get_the_ID(), 'categorie');
                    if ($terms && !is_wp_error($terms)) {
                        echo 'Catégorie : ';
                        foreach ($terms as $term) {
                            echo $term->name . ' ';
                        }
                    }
                    ?>
                </div>

                <div class="post-format">
                    <?php
                    // Récupère et affiche le format de la photo
                    $terms = get_the_terms(get_the_ID(), 'format');
                    if ($terms && !is_wp_error($terms)) {
                        echo 'Format : ';
                        foreach ($terms as $term) {
                            echo $term->name . ' ';
                        }
                    }
                    ?>
                </div>

                <div class="post-type">
                        <?php
                        // Récupère et affiche le type de la photo
                        $type = get_field('type');
                        if ($type) {
                            echo 'Type : ' . $type;
                        }
                        ?>
                    </div>

                <div class="post-year">
                    <?php
                    // Affiche l'année de publication de la photo
                    echo 'Année : ' . get_the_date('Y');
                    ?>
                </div>

            </div>
        </div>

        <!-- Affiche l'image à la une (thumbnail) de la photo -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>

        </div>

        <div class="second-section">

        <div class="CTA">
            <!-- Message d'appel à l'action -->
            <p>Cette photo vous intéresse ?</p>
            <!-- Bouton de contact -->
            <a id="modale" class="contact-button modale" href="#">Contact</a>
        </div>

        <div class="photo-navigation">
            <?php
            // Récupère les photos précédente et suivante
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>
            
                <div class="navigation_thumbnail">
                <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array('class' => 'mini-thumbnail')); ?>
                </div>

            <div class="navigation_arrow">
            <?php if (!empty($prev_post)) : ?>
                <!-- Lien pour la photo précédente -->
                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="arrow-thumbnail custom-prev-link">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/arrow-left.png" class="arrow" data-direction="previous" alt="Previous">
                </a>
            <?php endif; ?>

            <?php if (!empty($next_post)) : ?>
                <!-- Lien pour la photo suivante -->
                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="arrow-thumbnail custom-next-link">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/arrow-right.png" class="arrow" data-direction="next" alt="Next"> 
                </a>
            <?php endif; ?>
            </div>
        </div>

        <?php endwhile; // Fin de la boucle WordPress ?>
        </div>

        <section class="related-posts">
            <h2>Vous aimerez aussi</h2>
            <div class="related-photo">
            <?php
                // Effectuez une nouvelle requête pour récupérer deux autres publications du même type avec la même catégorie
                $related_posts_args = array(
                    'post_type' => 'photo', // Mettez à jour avec le nom de votre type de publication
                    'posts_per_page' => 2,
                    'orderby'        => 'rand',
                    'tax_query' => array(
                        array(
                        'taxonomy' => 'categorie',
                        'field' => 'id',
                        'terms' => wp_get_post_terms(get_the_ID(), 'categorie', array("fields" => "ids")),
                            ),
                                        ),
                        'post__not_in' => array(get_the_ID()), // Exclut la publication actuelle de la liste
                                          );

            $related_posts_query = new WP_Query($related_posts_args);

            if ($related_posts_query->have_posts()) :
                while ($related_posts_query->have_posts()) :
                    $related_posts_query->the_post();
            ?>

            <? get_template_part("template-part/block_photo") ?>
                    
            <?php
                endwhile;
                // Réinitialisez les paramètres de la requête personnalisée
                wp_reset_postdata();
                endif;
            ?>
            </div>
            

        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer(); // Ajoutez le code de pied de page standard de WordPress
?>
