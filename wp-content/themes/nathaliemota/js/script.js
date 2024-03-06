document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("menu-item-11");
    var btnBurger = document.getElementById("menu-item-77");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function () {
        modal.style.display = "block";
    };

    btnBurger.onclick = function () {
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
                lightboxEvent();
            }, 
        });
    }
    
    $('#load-more-button').on('click', function () {
        console.log('tata')
        loadMoreArticles();      
    });
});

function lightboxEvent(){
    console.log("test")
    
    // Sélectionnez les éléments nécessaires
    
    
    var closeBtn = document.querySelectorAll('.close-light');
    
    

    // Sélectionnez tous les éléments qui déclencheront la lightbox
    var triggers = document.querySelectorAll('.lightbox-trigger');

    // Ajoutez un gestionnaire d'événement à chaque déclencheur
    triggers.forEach(function (trigger) {
        trigger.addEventListener('click', function (event) {
            event.preventDefault();
            var idNumber = trigger.getAttribute('data-id');
            var lightbox = document.getElementById('custom-lightbox-'+ idNumber);
            console.log(idNumber);
            var ligthboxClose = document.querySelectorAll('.lightbox');
            for(var element of ligthboxClose){
                element.style.display = 'none';
            } 
            lightbox.style.display = 'block';
        });
    });
    
    for(var element of closeBtn){
        element.addEventListener('click', function () {
        var ligthboxClose = document.querySelectorAll('.lightbox');
            for(var element of ligthboxClose){
                element.style.display = 'none';
            }
        });
    }
  
};

document.addEventListener("DOMContentLoaded", function () {
lightboxEvent();
});


function burger(){
    var burger = document.getElementById("burger");
    var openBtn = document.getElementById("openBtn");
    var closeBtn = document.getElementById("closeBtn");

    openBtn.onclick = openBurger;
    closeBtn.onclick = closeBurger;

    function openBurger(){
        burger.classList.add("active");
    }

    function closeBurger(){
        burger.classList.remove("active")
    }
}

burger();

