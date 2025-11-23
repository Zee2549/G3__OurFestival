

document.addEventListener('DOMContentLoaded', function() {
    const hamburgerBtn = document.getElementById('hamburger-button');
    const closeBtn = document.getElementById('close-menu-button');

    const navLinks = document.getElementById('main-nav-links');

    if (hamburgerBtn && navLinks) {
        hamburgerBtn.addEventListener('click', function() {
            navLinks.classList.add('active');
        });
    }

    if (closeBtn && navLinks) {
        closeBtn.addEventListener('click', function() {
            navLinks.classList.remove('active');
        });
    }

    const navLinksAnchors = navLinks ? navLinks.querySelectorAll('.nav-a') : [];
    navLinksAnchors.forEach(anchor => {
        anchor.addEventListener('click', function() {
        });
    });
});

function startSlideshow() {
    const slides = document.querySelectorAll('.slide-img');
    let currentSlide = 0;

    function nextSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }
    setInterval(nextSlide, 5000);
}
window.onload = startSlideshow;