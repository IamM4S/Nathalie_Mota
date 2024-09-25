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
    contactBtn.onclick = function() {
        headerModal.style.display = "block";
    }

    // Close the modal header by clicking outside
    window.onclick = function(event) {
        if (event.target == headerModal) {
            headerModal.style.display = "none";
        }
    }

/*
// Ajax call to use the function WP_Query to get our recipes
document.addEventListener('DOMContentLoaded', function() {
 document.querySelector('#ajax_call').addEventListener('click', function() {
   let formData = new FormData();
   formData.append('action', 'request_recettes');


   fetch(cookinfamily_js.ajax_url, {
     method: 'POST',
     body: formData,
   }).then(function(response) {
     if (!response.ok) {
       throw new Error('Network response error.');
     }


     return response.json();
   }).then(function(data) {
     data.posts.forEach(function(post) {
       document.querySelector('#ajax_return').insertAdjacentHTML('beforeend', '<div class="col-12 mb-5">' + post.post_title + '</div>');
     });
   }).catch(function(error) {
     console.error('There was a problem with the fetch operation: ', error);
   });
 });
});
*/