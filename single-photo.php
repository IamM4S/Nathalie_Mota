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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="flèche gauche"/>
            <img class="arrow-right" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="flèche droite"/>
        </div>

    </div>

</section>


<?php get_footer(); ?>