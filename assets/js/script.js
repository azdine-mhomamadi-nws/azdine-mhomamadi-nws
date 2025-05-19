// MENU RESPONSIVE
const toggle = document.querySelector('.toggle');
const menu = document.querySelector('nav ul');

toggle.addEventListener('click', () => {
  menu.classList.toggle('active');
});

// ANIMATIONS AU SCROLL
const faders = document.querySelectorAll('.fade-in');

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    }
  });
}, { threshold: 0.2 });

faders.forEach(el => observer.observe(el));
