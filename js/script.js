// Mobile Menu
document.addEventListener( 'DOMContentLoaded', ( function() {
    /**
       * @param {HTMLElement} el
       * @param {string}      attr
       * @param {any}         value
       */
      const setAttr = ( el, attr, value ) => el.setAttribute( attr, value );
    
    /** @type {HTMLElement} */
    const siteNavigation = document.querySelector( 'nav' );
  
    if ( siteNavigation ) {
      /** @type {HTMLElement} */
      const mobileButton = siteNavigation.querySelector( 'button.menu-toggle' );
  
      /**
        * Au clic sur le bouton mobile, on affiche ou masque le menu :
        * - on ajouter/supprime la classe "toggled" sur la <nav> qui nous servira à masquer/afficher en css
        * - on passe l'attribut "aria-expanded" à true/false
        */
        if ( mobileButton ) {
          mobileButton.addEventListener( 'click', function() {
            siteNavigation.classList.toggle( 'toggled' );
  
            if ( mobileButton.getAttribute( 'aria-expanded' ) === 'true') {
              setAttr( mobileButton, 'aria-expanded', 'false' );
            } else {
              setAttr( mobileButton, 'aria-expanded', 'true' );
              console.log(mobileButton)
            }
          } );
        }
    }
    } ) );