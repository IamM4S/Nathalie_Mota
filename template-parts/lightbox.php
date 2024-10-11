<!-- Section | Photo -->
<i class="fas fa-expand fullscreen-icon"></i><!-- Fullscreen icon -->
  

<!-- Section | Lightbox Photo -->
<div class='modal-container'>
    <?php
        $prevPost = get_previous_post();
        $nextPost = get_next_post();

        $prevThumbnail = get_the_post_thumbnail_url( $prevPost->ID );
        $prevLink = get_permalink($prevPost);

        $nextThumbnail = get_the_post_thumbnail_url( $nextPost->ID );
        $nextLink = get_permalink($nextPost);
    ?>
    <!-- Bouton fermer -->
    <span class="btn-close"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/close_icon.png" alt="Croix de fermeture" /></span>
    <!-- Fleche -->
    <div class="left-arrow">
        <a href="<?php echo $prevLink; ?>" id="prev-arrow-link">
            <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/precedente-arrow.png" alt="Flèche gauche" /></span>
        </a>
    </div>
    <div>
        <!-- Image | Information de la Photo -->
        <div class="right-container">

            <img class="photo" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>" alt="Visualisation image en Lightbox">
            
        </div>
        <div class="lightbox-info-photo">
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
            <span id="modal-reference"><?php echo esc_html($related_reference_photo); ?></span>
            <span id="modal-category"><?php echo implode(', ', $related_category_names); ?></span>
        </div>
    </div>
    <!-- Fleche -->
    <div class="right-arrow">
        <a href="<?php echo $nextLink; ?>" id="next-arrow-link">
            <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/suivante-arrow.png" alt="Flèche droite" /></span>
        </a>
    </div>
</div>

        