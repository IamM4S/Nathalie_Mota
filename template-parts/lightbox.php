<!-- Section | Photo -->
<i class="fas fa-expand fullscreen-icon"></i><!-- Fullscreen icon -->

<div class="lightbox">
  <button class="lightbox__close">Fermer</button>
  <button class="lightbox__next">Suivant</button>
  <button class="lightbox__prev">Précédent</button>
  <div class="lightbox__container">
    <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>" alt="">
  </div>
</div>