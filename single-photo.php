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

        <div class="interaction-photo__navigation thumbnail-container">
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


<?php get_footer(); ?>