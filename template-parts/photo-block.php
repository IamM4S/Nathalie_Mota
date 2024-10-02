<!-- Section | Miniatures Personnalisées -->
<div class="photo-card">

    <?php
    // Interrogation | Sélection d'une photo aléatoire de la même catégorie
    $args_related_photos = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'orderby' => 'rand', // Tri des résultats de manière aléatoire
    );

    $related_photos_query = new WP_Query($args_related_photos);

    // Boucle | Parcourir les résultats de la requête
    while ($related_photos_query->have_posts()) :
        $related_photos_query->the_post();
        $post_permalink = get_permalink(); // Lien permanent de la publication actuelle
    ?>
    <a href="<?php echo esc_url($post_permalink); ?>">
        <div class="card-image" style="background-image: url('<?php echo get_field('photo'); ?>');">
        </div>
    </a>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); // Réinitialiser | Données de publication à leur état d'origine ?>

    </div>
    <div class="charger-plus-container">
        <button id="load-more-posts">Charger plus</button>
    </div>