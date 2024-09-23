    // MODALE CONTACT - HEADER
    var headerModal = document.getElementById('myModal');
    var headerBtn = document.getElementById("open-modal-button-header");

    // Afficher le modal header
    headerBtn.onclick = function() {
        headerModal.style.display = "block";
    }

    // Fermer le modal header en cliquant en dehors
    window.onclick = function(event) {
        if (event.target == headerModal) {
            headerModal.style.display = "none";
        }
    }