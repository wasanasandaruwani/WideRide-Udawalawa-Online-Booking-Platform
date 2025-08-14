import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Fade-in animation for header/footer
window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('nav.sticky, footer.animate-fade-in-up').forEach(el => {
        el.classList.add('opacity-0');
        setTimeout(() => {
            el.classList.add('opacity-100', 'transition-opacity', 'duration-700');
            el.classList.remove('opacity-0');
        }, 100);
    });
});

// Show scroll-to-top button
window.addEventListener('scroll', () => {
    const btn = document.querySelector('footer button.fixed');
    if (btn) {
        if (window.scrollY > 200) {
            btn.style.display = 'block';
        } else {
            btn.style.display = 'none';
        }
    }
});

// Smooth scroll to hotels section if navigated from navbar
window.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname === '/hotels' && window.location.hash === '') {
        const section = document.getElementById('hotels-section');
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
        }
    }
});
