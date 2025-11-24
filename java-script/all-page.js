

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

    const studentRadios = document.querySelectorAll('input[name="thammasat_student"]');
    const facultySection = document.getElementById('faculty-section');
    const facultySelect = document.getElementById('faculty-select');

    function toggleFacultyField() {
        const isStudent = document.querySelector('input[name="thammasat_student"]:checked');

        if (isStudent && isStudent.value === 'yes') {
            facultySection.style.display = 'block';
            facultySelect.required = true;
        } else {
            facultySection.style.display = 'none';
            facultySelect.required = false;
            facultySelect.value = '';
        }
    }
    studentRadios.forEach(radio => {
        radio.addEventListener('change', toggleFacultyField);
    });
    toggleFacultyField();



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

