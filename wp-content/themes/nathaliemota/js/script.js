document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("menu-item-11");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function () {
        modal.style.display = "block";
    };

    span.onclick = function () {
        modal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
});



document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("myModal");
    var btn = document.querySelector(".contact-button");
    var span = document.querySelector(".close");
    var referenceField = document.querySelector('.form_div_2 [name="your-subject"]');

    btn.onclick = function () {
        // Récupération de la référence ACF
        var referenceArray = document.querySelector('.post-reference').innerText.trim().split(':');
        var referenceValue = referenceArray.length > 1 ? referenceArray[1].trim() : '';

        // Affectation de la référence au champ du formulaire
        document.querySelector('.form_div_2 [name="your-subject"]').value = referenceValue;

        // Affichage de la modal
        modal.style.display = "block";
    };

    span.onclick = function () {
        // Fermeture de la modal
        modal.style.display = "none";
    };

    span.onclick = function () {
        modal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
});



jQuery(document).ready(function ($) {
    var page = 2;

    function loadMoreArticles() {
        var button = $('#load-more-button');

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'load_more_articles',
                page: page,
            },
            success: function (response) {
                $('.main-content-div').append(response);
                page++;
                console.log("succes test")
            },
        });
    }
    
    $('#load-more-button').on('click', function () {
        loadMoreArticles();
    });
});



