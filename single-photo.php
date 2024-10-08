<?php get_header(); ?>

<section class="content-zone">

    <div class="photo-info-bloc">
        <div class="info-bloc">
            <h1><?php the_title() ?></h1>
            <p>Référence : <span id="reference-photo"><?php echo get_field('reference'); ?></span></p>
            <p>Catégorie : <?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?></p>
            <p>Format : <?php echo strip_tags(get_the_term_list($post->ID, 'format')); ?></p>
            <p>Type : <?php echo get_field('type'); ?></p>
            <p>Année : <?php echo strip_tags(get_the_term_list($post->ID, 'annee')); ?></p>
        </div>
        <div class="photo-bloc">
            <img src="<?php echo get_field('photo'); ?>"/>
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
          <a href="<?php echo $prevLink; ?>">
            <img class="arrow-img-left arrow-gauche" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="Flèche pointant vers la gauche" />
          </a>
          <?php } else { ?>
          <img style="opacity:0; cursor: auto;" class="arrow " src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" />
          <?php } if (!empty($nextPost)) {
                        $nextThumbnail = get_the_post_thumbnail_url( $nextPost->ID );
                        $nextLink = get_permalink($nextPost); ?>
          <a href="<?php echo $nextLink; ?>">
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
        // Arguments | Requête pour les publications personnalisées
        $args_custom_posts = array(
            'post_type' => 'photo',          // Type de publication personnalisée (photo) 
            'posts_per_page' => 2,          // Nombre de publications à afficher par page
            'orderby' => 'date',             // Tri des publications par date
            'order' => 'DESC',               // Ordre de tri descendant - (de la plus récente à la plus ancienne).
        );        

        $custom_posts_query = new WP_Query($args_custom_posts);

        // Boucle | Parcourir les publications personnalisées
        while ($custom_posts_query->have_posts()) :
            $custom_posts_query->the_post();
        ?>
        <div class="custom-post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="thumbnail-wrapper">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                            <!-- Section | Overlay Catalogue -->
                            <div class="thumbnail-overlay">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Icône de l'œil"> <!-- Icône de l'œil | Informations sur la photo -->
                                <i class="fas fa-expand fullscreen-icon"></i><!-- Icône plein écran -->
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
                        </a>
                    </div>
                <?php endif; ?>
            </a>
        </div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); // Rétablir les données de publication d'origine ?>
    </div>
    
</div>
    </div>
</section>

<?php get_footer(); ?>