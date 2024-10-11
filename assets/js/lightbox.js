// LIGHTBOX//
    // Ajouter une division modale lorsque l'on clique sur une image dans .right-container
    jQuery('.fullscreen-icon').click(function(){
      // Ajoute la classe 'opened' à la boîte modale
      jQuery('.modal-container').addClass('opened');
      
      // Obtient l'URL de l'image cliquée
      const imageSrc = jQuery(this).attr('src');
      
      // Clone les flèches précédentes et suivantes
      const prevArrow = jQuery('#prev-arrow-link').clone();
      const nextArrow = jQuery('#next-arrow-link').clone();
      
      // Obtient les valeurs de référence et de catégorie à partir de leurs éléments correspondants
      const reference = jQuery('#ph-reference').text();
      const category = jQuery('#ph-category').text();
      
      // Met à jour les éléments de la boîte modale avec les valeurs obtenues
      jQuery('#modal-reference').html(reference);
      jQuery('#modal-category').html(category);
      jQuery('.middle-image').attr('src', imageSrc);
      jQuery('.left-arrow').html(prevArrow);
      jQuery('.right-arrow').html(nextArrow);
      
      // Obtient les liens des flèches précédentes et suivantes
      const refLeft = jQuery('.left-arrow > a').attr('href');
      const refRight = jQuery('.right-arrow > a').attr('href');
      
      // Modifie les liens des flèches pour inclure "?modal=1"
      jQuery('.left-arrow > a').attr('href', refLeft + '?modal=1');
      jQuery('.right-arrow > a').attr('href', refRight + '?modal=1');
      
      // Ajoute "Précédente" à la flèche de gauche si le span n'existe pas encore
      if (!jQuery('.left-arrow > a > span').length) {
          jQuery('.left-arrow > a').append('<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/precedente-arrow.png" alt="Flèche gauche" /></span>');
      }
      
      // Ajoute "Suivante" à la flèche de droite si le span n'existe pas encore
      if (!jQuery('.right-arrow > a > span').length) {
          jQuery('.right-arrow > a').append('<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/suivante-arrow.png" alt="Flèche droite" /></span>');
      }
  })
  
  // Gestion de la fermeture de la boîte modale lorsque l'on clique sur le bouton de fermeture
  jQuery('.btn-close').click(function(e){
      // Retire la classe 'opened' de la boîte modale pour la fermer
      jQuery('.modal-container').removeClass('opened');
  })
  
  // Obtient la chaîne de requête depuis l'URL actuelle
  var queryString = window.location.search;
  
  // Crée un objet URLSearchParams pour analyser les paramètres de la requête
  var searchParams = new URLSearchParams(queryString);
  
  // Obtient la valeur du paramètre 'modal'
  var modal = searchParams.get('modal');
  
  // Si 'modal' est présent dans l'URL, simule un clic sur une image pour ouvrir la boîte modale
  if( modal ){
      jQuery('.fullscreen-icon').click();
  }