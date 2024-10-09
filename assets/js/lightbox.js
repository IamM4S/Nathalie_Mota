var $lightbox = jQuery('.lightbox'); // L'élément HTML
var $lightboxIcon = jQuery('.fullscreen-icon');
var $lightboxClose = jQuery('.lightbox__close');

// Ouvrir la lightbox
$lightboxIcon.click(function(e) {
    e.preventDefault(); // On empêche le changement de page
    var url = jQuery(this).attr('src'); // On récupère l'URL de l'image dans href
    // On applique l'image en fond
    $lightbox.css('background-image', 'url(' + url + ')');
    $lightbox.css('display', 'flex');
    $lightbox.fadeIn(); // Et on fait apparaitre la lightbox

    buildDOM(url); {
        const dom = document.createElement('div')
        dom.classList.add('lightbox')
        dom.innerHTML = `<button class="lightbox__close">Fermer</button>
            <button class="lightbox__next">Suivante</button>
            <button class="lightbox__prev">Précédente</button>
            <div class="lightbox__container"></div>`
        dom.querySelector('.lightbox__next').addEventListener('click', this.next.bind(this))
        dom.querySelector('.lightbox__prev').addEventListener('click', this.prev.bind(this))
        return dom
      }


});
// Fermer la lightbox
$lightboxClose.click(function () {
    $lightbox.fadeOut();
});