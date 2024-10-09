<?php
// Disable Image Scaling
add_filter('big_image_size_threshold', '__return_false');


// Add support for featured images
add_theme_support( 'post-thumbnails' );

// Automatically add site title to the site header
add_theme_support( 'title-tag' );

// Declare Google Fonts
function wpb_add_google_fonts() {
  
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap', false ); 
    }
      
    add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

// Declare Font Awesome Icons
function enqueue_font_awesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');


function nm_theme_assets() {

    //Declare the JS
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);

    /*
    //Declare AJAX call
    wp_enqueue_script('ajax');
    wp_localize_script('ajax', 'wp_data', array('ajax_url' => admin_url('admin-ajax.php')));
    */

    //Declare the style.css file at the root of the theme
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0');

    //Declare the CSS file in another location
    wp_enqueue_style('css', get_template_directory_uri() . '/css/main.css', array(), '1.0');

    //Declare the Lightbox file
    wp_enqueue_script('lightbox', get_template_directory_uri() . '/assets/js/lightbox.js', array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts' , 'nm_theme_assets');

function photos_scripts() {

    wp_enqueue_script('photos', get_template_directory_uri() . '/assets/js/photos.js', array('jquery'), '', true);

    //Declare AJAX call
    wp_localize_script('photos', 'wp_data', array('ajax_url' => admin_url('admin-ajax.php')));
    }

register_nav_menus( array (
    'main' => 'Main menu',
    'footer' => 'Footer',
));
add_action('wp_enqueue_scripts', 'photos_scripts');


function nm_request_photos() {
    $page = $_GET['page']; // Récupère le numéro de page à charger à partir de la requête GET

    $args_custom_posts = array(
        'post_type' => 'photo', // Type de publication personnalisée à charger
        'posts_per_page' => 8, // Nombre de publications à afficher par page
    );

    // Vérification des paramètres de catégorie et de format dans la requête GET
    if( 
        $_GET['category'] != NULL && 
        $_GET['category'] != 'ALL' &&
        $_GET['format'] != NULL &&
        $_GET['format'] != 'ALL'
    ){
        // Si à la fois la catégorie et le format sont spécifiés, nous créons une requête complexe (opérateur logique "ET")
        $args_custom_posts['tax_query'] = array(
            'relation' => 'AND', // Opérateur logique "ET" pour s'assurer que les deux requêtes sont satisfaites
            array(
                'taxonomy' => 'categorie',
                'field'    => 'slug',
                'terms'    => $_GET['category']
            ),
            array(
                'taxonomy' => 'format',
                'field'    => 'slug',
                'terms'    => $_GET['format']
            )
        );
    }else{
        // Si seule la catégorie est spécifiée
        if( 
            $_GET['category'] != NULL && 
            $_GET['category'] != 'ALL'
        ){
            // Crée une requête pour filtrer par catégorie
            $args_custom_posts['tax_query'] = array(
                array(
                    'taxonomy' => 'categorie',
                    'field'    => 'slug',
                    'terms'    => $_GET['category']
                )
            );
        }
        // Si seul le format est spécifié
        if(
            $_GET['format'] != NULL &&
            $_GET['format'] != 'ALL' 
        ){
            // Crée une requête pour filtrer par format
            $args_custom_posts['tax_query'] = array(
                array(
                    'taxonomy' => 'format',
                    'field'    => 'slug',
                    'terms'    => $_GET['format']
                )
            );
        }
    }
    $args_custom_posts['orderby'] = 'date'; // Trie les publications par date
    $args_custom_posts['order'] = $_GET['dateSort'] != 'ALL' ? $_GET['dateSort'] : 'DESC'; // Ordonne par ordre descendant si le tri par date est spécifié
    $args_custom_posts['paged'] = $page; // Gère la pagination en fonction du numéro de page

    $custom_posts_query = new WP_Query($args_custom_posts); // Effectue une requête WordPress pour obtenir les publications personnalisées

    if ($custom_posts_query->have_posts()) {
        while ($custom_posts_query->have_posts()) :
            $custom_posts_query->the_post();
             // Contenu | Article - Même format que dans "photo-block.php"
            ?>
            <div class="custom-post-thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="thumbnail-wrapper">
                                <?php the_post_thumbnail(); ?>
                                <!-- Section | Overlay Catalogue -->
                                <div class="thumbnail-overlay">
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="eye-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Icône de l'œil"> <!-- Icône de l'œil | Information Photo -->
                                    </a>
                                    
                                    <?php include get_template_directory() . '/template-parts/lightbox.php';?><!-- Icône de plein écran -->
                                    <?php
                                    // Récupère la référence et la catégorie de l'image associée
                                    $related_reference_photo = get_field('reference');
                                    $related_categories = get_the_terms(get_the_ID(), 'categorie');
                                    $related_category_names = array();

                                    if ($related_categories) {
                                        foreach ($related_categories as $category) {
                                            $related_category_names[] = esc_html($category->name);
                                        }
                                    }
                                    ?>
                                    <div class="photo-info">
                                        <div class="photo-info-left">
                                            <p><?php echo esc_html($related_reference_photo); ?></p>
                                        </div>
                                        <div class="photo-info-right">
                                            <p><?php echo implode(', ', $related_category_names); ?></p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <?php endif; ?>
            </div>
        <?php
            // Fin de la structure du contenu de l'article
        endwhile;
        wp_reset_postdata(); // Réinitialise les données des publications personnalisées
    } else {
        // Aucun autre article à charger
    }
    die();
}

add_action('wp_ajax_nm_request_photos', 'nm_request_photos');
add_action('wp_ajax_nopriv_nm_request_photos', 'nm_request_photos');