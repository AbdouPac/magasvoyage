/* ANIMATION POUR LA BARE DE MENU */
const hamburgerToggler = document.querySelector(".hamburger")
const navLinkContainer = document.querySelector(".navlinks-container");

const toggleNav = () => {
    hamburgerToggler.classList.toggle("open")

    const ariaToggle = hamburgerToggler.getAttribute
    ("aria-expanded") === "true" ? "false" : "true";
    hamburgerToggler.setAttribute("aria-expanded", ariaToggle)

    navLinkContainer.classList.toggle("open")
}

hamburgerToggler.addEventListener("click", toggleNav)

new ResizeObserver(entries => {
    if(entries[0].contentRect.width <= 900){
        navLinkContainer.style.transition = "transform 0.4s ease-out";
    }
    else{
        navLinkContainer.style.transition = "none"
    }
}).observe(document.body)


/**  ANIMATION AU SCROLL */
document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll('.navlinks-container a');
    const sections = document.querySelectorAll('.section');
    const navbarHeight = document.querySelector('nav').offsetHeight; // Récupère la hauteur du nav

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            // Retirer fullscreen et animation des autres sections
            sections.forEach(section => {
                section.classList.remove('fullscreen', 'fullscreen-animation');
            });

            if (targetSection) {
                targetSection.classList.add('fullscreen', 'fullscreen-animation');

                // Scroll ajusté pour compenser la hauteur de la navbar
                window.scrollTo({
                    top: targetSection.offsetTop - navbarHeight,
                    behavior: 'smooth'
                });
            }
        });
    });
});


 // Fonction pour afficher/masquer le texte du bouton
 function afficherTexte() {
    var texte = document.getElementById("texteEtapes");
    var bouton = document.querySelector(".voir-plus-btn");

    // Vérifie si le texte est masqué
    if (texte.style.display === "none") {
        texte.style.display = "block";
        bouton.textContent = "Voir moins"; // Change le texte du bouton
    } else {
        texte.style.display = "none";
        bouton.textContent = "Voir plus"; // Réinitialise le texte du bouton
    }
}

  // Fonction pour afficher/masquer le texte des étapes du Hajj
  function afficherTexteHajj() {
    var texte = document.getElementById("texteEtapesHajj");
    var bouton = document.querySelector(".voir-plus-btn-hajj");

    // Vérifie si le texte est masqué
    if (texte.style.display === "none") {
        texte.style.display = "block";
        bouton.textContent = "Voir moins"; // Change le texte du bouton
    } else {
        texte.style.display = "none";
        bouton.textContent = "Voir plus"; // Réinitialise le texte du bouton
    }
}

/* COPYRIGHT */
document.getElementById("currentYear").textContent = new Date().getFullYear();



// Fonction pour détecter les éléments visibles au scroll
function revealOnScroll() {
    const elements = document.querySelectorAll('.wrapper > div');
    
    elements.forEach(el => {
        const windowHeight = window.innerHeight;
        const elementTop = el.getBoundingClientRect().top;
        const visibilityThreshold = 150; // Distance avant affichage

        if (elementTop < windowHeight - visibilityThreshold) {
            el.classList.add('show');  // Active l'animation
        }
    });
}

// Déclenchement lors du scroll et au chargement de la page
window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);








    // S'assurer que le DOM est bien chargé
    document.addEventListener('DOMContentLoaded', function() {
        // Ouvrir la modale au clic
        document.getElementById('openContactModal').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('contactModal').style.display = 'block';
        });

        // Fermer la modale avec le bouton X
        document.querySelector('.close-btn').addEventListener('click', function() {
            document.getElementById('contactModal').style.display = 'none';
        });

        // Fermer la modale en cliquant à l'extérieur
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('contactModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
