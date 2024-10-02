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
    var reference = $('#reference-photo').text();
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
