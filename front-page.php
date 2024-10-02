<?php get_header() ?>
<section class="hero-section">
  <?php
  // Interrogation | Sélection d'une photo aléatoire de la même catégorie
  $args_related_photos = array(
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'orderby' => 'rand', // Tri des résultats de manière aléatoire
  );

  $related_photos_query = new WP_Query($args_related_photos);

  // Boucle | Parcourir les résultats de la requête
  while ($related_photos_query->have_posts()) :
    $related_photos_query->the_post();
  ?>
  <div class="hero-image" style="background-image: url('<?php echo get_field('photo'); ?>');">
    <div class="hero-text">
      <h1>PHOTOGRAPHE EVENT</h1>
    </div>
  </div>
  <?php endwhile; ?>

  <?php wp_reset_postdata(); // Réinitialiser | Données de publication à leur état d'origine ?>
</section>

<section class="photos-section">
  <div class="filter-section">
    <div class="category-format">
        <select name="category-filter" id="category-filter">
            <option value="ALL">CATÉGORIE</option>
            <?php
            $photo_categories = get_terms('categorie');
            foreach ($photo_categories as $category) {
                echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
            }
            ?>
        </select>
        <select name="format-filter" id="format-filter">
            <option value="ALL">FORMAT</option>
            <?php
             $photo_formats = get_terms('format');
             foreach ($photo_formats as $format) {
                echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
             }
            ?>
        </select>
    </div>
    <div class="date-sort">
        <select name="date-sort" id="date-sort">
            <option value="ALL">TRIER PAR</option>
            <option value="DESC">A partir des plus récentes</option>
            <option value="ASC">A partir des plus anciennes</option>
        </select>
    </div>
  </div>

  </div>
    <!-- Section | Bloc de photos -->
    <div id="photo-container">
        <?php include get_template_directory() . '/template-parts/photo-block.php'; ?>
    </div>

  </div>

</section>




<?php get_footer(); ?>