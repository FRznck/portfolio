// Effet d'apparition au défilement
const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    },
    { threshold: 0.2 }
);

document.querySelectorAll('.section-title, .skill-item').forEach((el) => observer.observe(el));

// bouton pour scroller vers le haut
const scrollToTopButton = document.createElement('button');
scrollToTopButton.innerText = '↑';
scrollToTopButton.className = 'scroll-to-top';
document.body.appendChild(scrollToTopButton);

scrollToTopButton.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

window.addEventListener('scroll', () => {
    scrollToTopButton.style.display = window.scrollY > 300 ? 'block' : 'none';
});

// Effet de défilement pour les sections
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Code concernant la section hero, les defillements de competences et le carousel
document.addEventListener('DOMContentLoaded', () => {
    const typedTextSpan = document.querySelector(".home-content h3");
    const textArray = ["Etudiant en Informatique", "recherche une alternance"];
    const typingDelay = 100;
    const erasingDelay = 50;
    const newTextDelay = 2000; 
    let textArrayIndex = 0;
    let charIndex = 0;

    function type() {
        if (charIndex < textArray[textArrayIndex].length) {
            typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
            charIndex++;
            setTimeout(type, typingDelay);
        } else {
            setTimeout(erase, newTextDelay);
        }
    }

    function erase() {
        if (charIndex > 0) {
            typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex - 1);
            charIndex--;
            setTimeout(erase, erasingDelay);
        } else {
            textArrayIndex++;
            if (textArrayIndex >= textArray.length) textArrayIndex = 0;
            setTimeout(type, typingDelay + 1100);
        }
    }

    // Lancement du typewriting
    if (textArray.length) setTimeout(type, newTextDelay + 250);
});

// Animation au scroll avec Intersection Observer
const obersvons = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
        }
    });
}, {
    threshold: 0.1 // Déclenche l'animation quand 10% de l'élément est visible
});

// Observe tous les éléments avec la classe .animate-on-scroll
document.querySelectorAll('.animate-on-scroll').forEach((element) => {
    obersvons.observe(element);
});

// Animation spécifique pour le carousel
document.querySelectorAll('.carousel-item').forEach((item, index) => {
    item.addEventListener('slid.bs.carousel', () => {
        // Réinitialise les animations à chaque changement de slide
        item.querySelectorAll('.skill-card').forEach(card => {
            card.classList.remove('active');
            setTimeout(() => obersvons.observe(card), 500);
        });
    });
});
// carousel.js
document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('.carousel');
    const cards = document.querySelectorAll('.card-container');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    const indicatorsContainer = document.querySelector('.carousel-indicators');
    let currentIndex = 0;
    
    // Création des indicateurs
    cards.forEach((_, index) => {
        const indicator = document.createElement('span');
        indicator.addEventListener('click', () => goToSlide(index));
        indicatorsContainer.appendChild(indicator);
    });
    
    const indicators = document.querySelectorAll('.carousel-indicators span');
    
    // Gestionnaire d'événements pour le flip des cartes
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', function() {
            this.classList.toggle('flipped');
        });
    });

    // Navigation
    function updateCarousel() {
        const cardWidth = cards[0].offsetWidth + 30; // inclut l'espacement
        carousel.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        indicators.forEach(indicator => indicator.classList.remove('active'));
        indicators[currentIndex].classList.add('active');
    }

    function goToSlide(index) {
        currentIndex = Math.max(0, Math.min(index, cards.length - 1));
        updateCarousel();
    }

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentIndex < cards.length - 1) {
            currentIndex++;
            updateCarousel();
        }
    });

    // Responsivité
    window.addEventListener('resize', () => {
        currentIndex = 0;
        updateCarousel();
    });

    // Initialisation
    indicators[0].classList.add('active');
});



