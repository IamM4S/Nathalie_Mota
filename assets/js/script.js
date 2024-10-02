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
navigationPhotos($('.arrow-gauche'), $('.previous-image'));
navigationPhotos($('.arrow-droite'), $('.next-image'));

  function navigationPhotos(arrow, image) {
    arrow.hover(
      function () {
        image.css('opacity', '1');
      },
      function () {
        image.css('opacity', '0');
      }
    );
  }