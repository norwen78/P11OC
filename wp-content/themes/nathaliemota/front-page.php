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
            <form method="POST" action="" id="filter-form">
                <div class="double-filter">
                <?php wp_dropdown_categories(array('taxonomy' => 'categorie', 'name' => 'category', 'show_option_all' => 'Toutes les catégories',  'id' => 'category-filter')); ?>
                <?php wp_dropdown_categories(array('taxonomy' => 'format', 'name' => 'format', 'show_option_all' => 'Tout les formats', 'id' => 'format-filter')); ?>
                </div>
                <div class="single-filter">
                <select name="order" id="order-filter">
                    <option value="desc">Ordre</option>
                    <option value="desc">A partir des plus récentes</option>
                    <option value="asc">A partir des plus anciennes</option>
                </select>
                </div>
            </form>

            <div class="main-content-div">
            <?php
    // Définissez les arguments de la requête pour récupérer les 4 premiers articles personnalisés de type "photo"
                // Récupérer les valeurs des filtres
            $category_filter = isset($_POST['category-filter']) ? $_POST['category-filter'] : '';
            $format_filter = isset($_POST['format-filter']) ? $_POST['format-filter'] : '';
            $order_filter = isset($_POST['order-filter']) ? $_POST['order-filter'] : 'desc';

            // Définir les arguments de la requête en fonction des filtres
            $args = array(
                'post_type'      => 'photo',
                'posts_per_page' => 8,
                'order'          => 'DESC',
            );

            // Ajouter la taxonomie "categorie" à la requête si elle est sélectionnée
            if (!empty($category_filter) && is_numeric($category_filter)) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'categorie',
                    'field'    => 'id',
                    'terms'    => $category_filter,
                );
            }

            // Ajouter la taxonomie "formats" à la requête si elle est sélectionnée
            if (!empty($format_filter) && is_numeric($format_filter)) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'format',
                    'field'    => 'id',
                    'terms'    => $format_filter,
                );
            }

            // Effectuer la requête
            $query = new WP_Query($args);

            // Bouclez à travers les articles
            while ($query->have_posts()) : $query->the_post();
                // Afficher le contenu de l'article
                get_template_part("template-part/block_photo");
            endwhile;

            // Réinitialiser les paramètres de la requête principale
            wp_reset_postdata();
    ?>
            
            </div>
            <div>
                <button id="load-more-button">Charger plus</button>
            </div>
            </section>
        </main>
<?php 
get_footer();