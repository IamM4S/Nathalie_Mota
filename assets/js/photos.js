
    
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
        jQuery('.right-container img').click();
    }

// CHARGER PLUS (PHOTOS) + FILTRES (FUNCTIONS.PHP)
let loading = false; // Indique si le chargement est en cours ou non
const $loadMoreButton = jQuery('#load-more-posts'); // Sélectionne le bouton "Charger plus"
const $container = jQuery('.thumbnail-container-accueil'); // Sélectionne le conteneur de vignettes

$loadMoreButton.on('click', function () {
    get_more_posts(true) // Appelle la fonction pour obtenir plus de publications
});

function get_more_posts(load) {
    let inputPage = jQuery('input[name="page"]');
    let page = parseInt(inputPage.val());
    page = load ? page + 1 : 1; // Incrémente le numéro de page si "load" est vrai, sinon réinitialise à 1.
    const category = jQuery('select[name="category-filter"]').val();
    const format = jQuery('select[name="format-filter"]').val();
    const dateSort = jQuery('select[name="date-sort"]').val();

    console.log(category, format, dateSort, page);

    jQuery.ajax({
        type: 'GET',
        url: wp_data.ajax_url, // Ceci est défini dans functions.php
        data: {
            action: 'nm_request_photos',
            page,
            category,
            format,
            dateSort
        },
        success: function (response) {
            if (response) {
                if (load) {
                    $container.append(response); // Ajoute la réponse (nouvelles publications) au conteneur
                } else {
                    $container.html(response); // Remplace le contenu du conteneur par la réponse (nouvelles publications)
                }
                $loadMoreButton.text('Charger plus'); // Remet le texte du bouton à "Charger plus"
                inputPage.val(page); // Met à jour le numéro de page
                loading = false; // Indique que le chargement est terminé
            } else {
                if (load) {
                    $loadMoreButton.text('Fin des publications'); // Change le texte du bouton en "Fin des publications"
                } else {
                    let txt = '<div style="text-align:center;width:100%; color: #000;font-family: Space Mono, monospace;font-size: 16px;"><p>Aucun résultat ne correspond aux filtres de recherche.<br>';
                    $container.html(txt); // Affiche un message si aucune réponse n'est trouvée
                }
            }
        },
    });
    if (!loading) {
        loading = true;
        $loadMoreButton.text('Chargement en cours...'); // Change le texte du bouton en "Chargement en cours..."
    }
}

function recursive_change(selectId) {
    jQuery('#' + selectId).change(function () {
        get_more_posts(false); // Appelle la fonction pour obtenir plus de publications sans "load"
    });
}

if (jQuery('#category-filter').length) {
    recursive_change('category-filter'); // Applique la fonction de changement aux filtres de catégorie
}

if (jQuery('#format-filter').length) {
    recursive_change('format-filter'); // Applique la fonction de changement aux filtres de format
}

if (jQuery('#date-sort').length) {
    recursive_change('date-sort'); // Applique la fonction de changement aux filtres de tri par date
}