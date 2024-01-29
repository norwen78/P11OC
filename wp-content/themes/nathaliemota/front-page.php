<?php get_header();
?>
    <? get_template_part("template-part/modale") ?>
    <?php
        // Arguments de la requête pour obtenir une image aléatoire du type de contenu 'photo'//
        $random_image_args = array(
            'post_type' => 'photo',     // Type de contenu personnalisé
            'posts_per_page' => 1,      // Limite le nombre de résultats à 1
            'orderby' => 'rand'         // Tri aléatoire
        );

        // Initialisation de la requête WP_Query
        $random_image_query = new WP_Query($random_image_args);

        // Vérifier si la requête a des résultats
        if ($random_image_query->have_posts()) {
            // Boucle à travers les résultats //
            while ($random_image_query->have_posts()) {
                $random_image_query->the_post();
                // Récupérer l'URL de l'image à la une en taille complète ('full') //
                $background_image_url = get_the_post_thumbnail_url(null, 'full');
            }

            // Réinitialisation des données de la requête principale //
            wp_reset_postdata();
        }
        ?>



        <main>
            <section class="banner" >
            <div style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
                <h1>
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/title.png'; ?>" alt="Titre du site">
                </h1>
            </div> 
            </section>

            <section class="main-content">
            <div class="main-content-div">
            <?php
    // Définissez les arguments de la requête pour récupérer les 4 premiers articles personnalisés de type "photo"
    $args = array(
        'post_type'      => 'photo', // Remplacez 'photo' par le nom de votre type de publication personnalisé
        'posts_per_page' => 8,        // Affichez 4 articles
    );

    // Effectuez la requête
    $query = new WP_Query($args);

    // Bouclez à travers les 4 premiers articles
    while ($query->have_posts()) : $query->the_post();
    ?>
                <? get_template_part("template-part/block_photo") ?>
<?php
            endwhile;

    // Réinitialisez les paramètres de la requête principale
    wp_reset_postdata();
    ?>
            
            </div>
            <div>
                <button id="load-more-button">Charger plus d'articles</button>
            </div>
            </section>
            
        </main>
<?php 
get_footer();