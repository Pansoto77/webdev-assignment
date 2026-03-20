// Student Registration Number: 2402515

/* --- UI HANDLERS --- */

// Initialize Mobile Navigation
function initNavbarToggle() {
  const toggle = document.querySelector(".nav-toggle");
  const navLinks = document.querySelector(".navbar-links");
  
  if (toggle && navLinks) {
    toggle.addEventListener("click", () => {
      navLinks.classList.toggle("show");
    });
  }
}

// Global Init
document.addEventListener("DOMContentLoaded", () => {
  initNavbarToggle();
});