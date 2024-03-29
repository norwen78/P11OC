<?php
add_action('wp_enqueue_scripts', 'load_scripts');
add_action('wp_enqueue_scripts','add_select2');
function enqueue_custom_styles() {
    wp_enqueue_style('home', get_stylesheet_directory_uri() . '/css/home.css');   
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles');



function register_my_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Menu principal' ),
            'footer-menu' => __('Footer Menu'),
            'burger-menu' => __('Menu Burger')

        )
    );
}
add_action( 'init', 'register_my_menus' );



// Fonction pour charger les articles supplémentaires
function load_more_articles() {
    $page = $_POST['page'];

    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'paged'          => $page,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part("template-part/block_photo");
        endwhile;
    endif;

    wp_die(); // Important pour terminer la requête AJAX
}

// Action WordPress pour la fonction AJAX
add_action('wp_ajax_load_more_articles', 'load_more_articles');
add_action('wp_ajax_nopriv_load_more_articles', 'load_more_articles');





// Fonction pour charger les scripts JavaScript
function load_scripts() {
    // Enregistrez et chargez le script JavaScript
    wp_enqueue_script('your-script-handle', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);

    // Définissez les données que vous souhaitez passer au script
    $ajax_data = array(
        'ajax_url' => admin_url('admin-ajax.php'),
    );

    // Passez les données au script JavaScript
    wp_localize_script('your-script-handle', 'ajax_object', $ajax_data);
}

// Action WordPress pour charger les scripts



add_action('wp_footer', 'ajax_filter_posts_script', 100);
function ajax_filter_posts_script() {
    ?>
    <script type="text/javascript">
        jQuery(function($){
            $('#category-filter, #format-filter, #order-filter').change(function(){
                var category = $('#category-filter').val();
                var format = $('#format-filter').val();
                var order = $('#order-filter').val();
                var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                        action: 'filter_posts',
                        category: category,
                        format: format,
                        order: order,
                    },
                    success: function(response) {
                        $('.main-content-div').html(response);
                    }
                });
            });
        });
    </script>
    <?php
}

add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');

function filter_posts() {
    $category = $_POST['category'];
    $format = $_POST['format'];
    $order = $_POST['order'];

    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'order'          => $order,
    );

    if (!empty($category) && is_numeric($category)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field'    => 'id',
            'terms'    => $category,
        );
    }

    if (!empty($format) && is_numeric($format)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field'    => 'id',
            'terms'    => $format,
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part("template-part/block_photo");
        endwhile;
    endif;

    wp_die();
}



function add_select2() {
    wp_enqueue_script('select2','https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js');
    wp_enqueue_style('select2','https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
}



