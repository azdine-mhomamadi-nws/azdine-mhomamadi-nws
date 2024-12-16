const navMenu = document.querySelector('.nav-menu ul');
const navMenuBtn = document.querySelector('.nav-menu-btn');

// Gestion du menu burger en responsive
menuBtn.addEventListener("click", () => {
  navMenu.classList.toggle("active"); // Active/désactive l'affichage du menu
});
