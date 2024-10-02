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

        <div class="nav-links">
            <?php
            // Récupère l'ID de la publication actuelle.
            $current_post_id = get_the_ID();

            // Récupère toutes les publications de type 'photo'.
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => -1,
                'order' => 'ASC',
            );
            $all_photo_posts = get_posts($args);

            // Trouve l'index de la publication actuelle dans le tableau de toutes les publications de photos.
            $current_post_index = array_search($current_post_id, array_column($all_photo_posts, 'ID'));

            // Calcule les index des publications précédentes et suivantes.
            $prev_post_index = $current_post_index - 1;
            $next_post_index = $current_post_index + 1;

            // Récupère les publications précédentes et suivantes.
            $prev_post = ($prev_post_index >= 0) ? $all_photo_posts[$prev_post_index] : end($all_photo_posts);
            $next_post = ($next_post_index < count($all_photo_posts)) ? $all_photo_posts[$next_post_index] : reset($all_photo_posts);

            $prev_permalink = get_permalink($prev_post);
            $next_permalink = get_permalink($next_post);

            // Récupère les miniatures des publications précédentes et suivantes.

            $prev_thumbnail = get_the_post_thumbnail($prev_post, 'thumbnail');
            $next_thumbnail = get_the_post_thumbnail($next_post, 'thumbnail');
            ?>

            <!-- Conteneur de miniatures individuelles -->
            <div class="thumbnail-container">
                <div class="thumbnail-wrapper">
                    <!-- Initialement, le contenu de la miniature sera vide -->
                    <div class="preview">
                        <img class="previous-image" src="<?php echo $prevThumbnail; ?>" alt="Prévisualisation image précédente">
                    </div>
                    <div class="preview">
                        <img class="next-image" src="<?php echo $nextThumbnail; ?>" alt="Prévisualisation image suivante">
                    </div>
                </div>
                <div class="thumbnail-arrows">
                    <a href="<?php echo esc_url($prev_permalink); ?>" class="arrow-link" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url($prev_post, 'thumbnail')); ?>" id="prev-arrow-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="Précédent" class="arrow-img-left arrow-gauche" id="prev-arrow" />
                    </a>
                    <a href="<?php echo esc_url($next_permalink); ?>" class="arrow-link" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url($next_post, 'thumbnail')); ?>" id="next-arrow-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.png" alt="Suivant" class="arrow-img-right arrow-droite" id="next-arrow" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    </div>

    

</section>


<?php get_footer(); ?>