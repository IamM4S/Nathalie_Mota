<?php get_header(); ?>

<section class="content-zone">

    <div class="photo-info-bloc">
        <div class="info-bloc">

            <?php
                // Référence de la photo
                // Récupère la valeur du champ personnalisé 'reference_photo' et l'affiche s'il existe.
                $reference_photo = get_field('reference');
                if ($reference_photo) {
                    echo '<p>Référence : <span id="ph-reference">' . esc_html($reference_photo) . '</span></p>';
                }

                // Catégories de la photo
                // Récupère les catégories associées à la photo actuelle.
                $categories = get_the_terms(get_the_ID(), 'categorie');
                $current_category_slugs = array(); // Initialise un tableau vide pour les slugs de catégorie.

                if ($categories) {
                    // Parcourir les catégories et stocker leurs slugs dans le tableau.
                    foreach ($categories as $category) {
                        $current_category_slugs[] = $category->slug;
                    }
                }

                if ($categories) {
                    // Si des catégories existent, les afficher.
                    echo '<p>Catégorie : <span id="ph-category">';
                    $category_names = array();
                    foreach ($categories as $category) {
                        $category_names[] = esc_html($category->name);
                    }
                    echo implode(', ', $category_names); // Utiliser implode pour joindre les noms de catégorie par une virgule.
                    echo '</span></p>';
                }

                // Format de la photo
                // Récupère les termes de format associés à la photo actuelle.
                $format_terms = get_the_terms(get_the_ID(), 'format');
                if ($format_terms) {
                    // Si des termes de format existent, les afficher.
                    echo '<p>Format : ';
                    $format_names = array();
                    foreach ($format_terms as $format_term) {
                        $format_names[] = esc_html($format_term->name);
                    }
                    echo implode(', ', $format_names); // Utiliser implode pour joindre les noms de format par une virgule.
                    echo '</p>';
                }

                // Type de la photo
                // Récupère la valeur du champ personnalisé 'type_de_photo' et l'affiche s'il existe.
                $type_de_photo = get_field('type');
                if ($type_de_photo) {
                    echo '<p>Type : ' . esc_html($type_de_photo) . '</p>';
                }

                // L'année de capture
                // Récupère l'année de capture et l'affiche si elle existe.
                $date_capture = get_the_date('Y');
                if ($date_capture) {
                    echo '<p>Année : ' . esc_html($date_capture) . '</p>';
                }
                ?>
            </div>
            <div class="photo-bloc">
                <img src="<?php echo get_field('photo'); ?>"/>
            </div>
        </div>
        </div>

    </div>

    <div class="actions-bloc">
        <div class="contact-link">
            <p>Cette photo vous intéresse ?</p>
            <button id="open-modal-button">Contact</button>
        </div>

        <div class="nav-links thumbnail-container">
          <?php
                    $prevPost = get_previous_post();
                    $nextPost = get_next_post();
                ?>
          <div class="arrows thumbnail-arrows">
          <?php if (!empty($prevPost)) {
                        $prevThumbnail = get_the_post_thumbnail_url( $prevPost->ID );
                        $prevLink = get_permalink($prevPost); ?>
          <a href="<?php echo $prevLink; ?>" id="prev-arrow-link">
            <img class="arrow-img-left arrow-gauche" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="Flèche pointant vers la gauche" />
          </a>
          <?php } else { ?>
          
          <?php } if (!empty($nextPost)) {
                        $nextThumbnail = get_the_post_thumbnail_url( $nextPost->ID );
                        $nextLink = get_permalink($nextPost); ?>
          <a href="<?php echo $nextLink; ?>" id="next-arrow-link">
            <img class="arrow-img-right arrow-droite" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.png" alt="Flèche pointant vers la droite" />
          </a>
          <?php } ?>
        </div>
        <div class="preview">
          <img class="previous-image" src="<?php echo $prevThumbnail; ?>" alt="Prévisualisation image précédente">
          <img class="next-image" src="<?php echo $nextThumbnail; ?>" alt="Prévisualisation image suivante">
        </div>
    </div>

</section>

<section class="recommandations">
    <div class="related-images">
        <h3>VOUS AIMEREZ AUSSI</h3>
        <!-- Section | Miniatures Personnalisées -->
        <div class="custom-post-thumbnails">
            <input type="hidden" name="page" value="1">
            <div class="thumbnail-container-accueil">
            <?php
            // Récupère deux photos aléatoires de la même catégorie que la photo actuelle.
            $args_related_photos = array(
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $current_category_slugs, // Utilise le slug de la catégorie de la photo actuelle
                    ),
                ),
            );

            $related_photos_query = new WP_Query($args_related_photos);

            while ($related_photos_query->have_posts()) :
                $related_photos_query->the_post();
            ?>
        <div class="custom-post-thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="thumbnail-wrapper">
                            <?php the_post_thumbnail(); ?>
                            <!-- Section | Overlay Catalogue -->
                            <div class="thumbnail-overlay">
                                <a href="<?php the_permalink(); ?>">
                                    <img class="eye-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Icône de l'œil"> <!-- Icône de l'œil | Informations sur la photo -->
                                </a>
                                
                                <?php include get_template_directory() . '/template-parts/lightbox.php';?><!-- Icône plein écran -->
                                <?php
                                // Récupère la référence et la catégorie de l'image associée.
                                $related_reference_photo = get_field('reference');   // Récupère la référence de la photo
                                $related_categories = get_the_terms(get_the_ID(), 'categorie');   // Récupère les catégories de la photo
                                $related_category_names = array();

                                if ($related_categories) {
                                    foreach ($related_categories as $category) {
                                        $related_category_names[] = esc_html($category->name);
                                    }
                                }
                                ?>
                                <!-- Overlay | Récupère la Référence et la Catégorie de l'image associée au survol-->
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
        <?php endwhile; ?>

        <?php wp_reset_postdata(); // Rétablir les données de publication d'origine ?>
    </div>
    
</div>
    </div>
</section>

<?php get_footer(); ?>