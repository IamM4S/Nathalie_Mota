// MENU BURGER MOBILE
var headerMenu = document.getElementById('myMenu');
var menuBtn = document.getElementById("open-fullscreen-menu-button");
var closeMenuBtn = document.getElementById("close-fullscreen-menu-button");
var mainContent = document.getElementById("main-content");
var originalContent = mainContent.innerHTML;
var mobileMenuContent = document.getElementById("mobile-menu-content").innerHTML;
var footerContent = document.getElementById("footer-content");

var mobileHeaderModal = document.getElementsByClassName('modal');
var mobileHeaderBtn = document.getElementsByClassName("btn-modale");

// Show modal header
menuBtn.onclick = function() {
  headerMenu.style.display = "block";
  menuBtn.style.display = "none";
  mainContent.innerHTML = mobileMenuContent;
  mainContent.classList.add("mobile-menu-opened");
  footerContent.style.display = "none";

}

closeMenuBtn.onclick = function() {
  headerMenu.style.display = "none";
  menuBtn.style.display = "block";
  mainContent.innerHTML = originalContent;
  mainContent.classList.remove("mobile-menu-opened");
  footerContent.style.display = "block";
}

// Show modal header
mobileHeaderBtn.onclick = function() {
  mobileHeaderModal.style.display = "block";
}

// Close the modal header by clicking outside
window.onclick = function(event) {
  if (event.target == headerModal) {
      headerModal.style.display = "none";
  }
}

    // MODALE CONTACT - HEADER
    var headerModal = document.getElementById('myModal');
    var headerBtn = document.getElementById("open-modal-button-header");

    // Show modal header
    headerBtn.onclick = function() {
        headerModal.style.display = "block";
    }

    // Close the modal header by clicking outside
    window.onclick = function(event) {
        if (event.target == headerModal) {
            headerModal.style.display = "none";
        }
    }

    // MODALE CONTACT
    var headerModal = document.getElementById('myModal');
    var contactBtn = document.getElementById("open-modal-button");

    // Show modal header
    contactBtn.onclick = function(event) {
        headerModal.style.display = "block";
    }

    // Close the modal header by clicking outside
    window.onclick = function(event) {
        if (event.target == headerModal) {
            headerModal.style.display = "none";
        }
    }



// Contact Form Pre-fill
jQuery(document).ready(function($){
    var reference = $('#ph-reference').text();
    $("#pre-fill").val(reference);
});

// Navigation Photos
jQuery(document).ready(function($){
    var arrowLeft = $('.arrow-gauche');
    var arrowRight = $('.arrow-droite');
    var imagePrev = $('.previous-image');
    var imageNext = $('.next-image');
    
    navigationPhotos(arrowLeft, imagePrev);
    navigationPhotos(arrowRight, imageNext);
    
      function navigationPhotos(arrow, image1, image2) {
        arrow.hover(
          function () {
            image1.css('display', 'flex');
            image2.css('display', 'flex');
          },
          function () {
            image1.css('display', 'none');
            image2.css('display', 'none');
          }
        );
      }
})

