  const toggleBtn = document.querySelector('.menu-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');

  toggleBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('active');
  });
