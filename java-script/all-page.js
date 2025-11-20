

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