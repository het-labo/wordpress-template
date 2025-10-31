document.addEventListener('DOMContentLoaded', () => {
  const parents = document.querySelectorAll('.menu-item-has-children');

  parents.forEach((item) => {
    const submenu = item.querySelector('.sub-menu');
    if (!submenu) return;

    submenu.style.display = 'none';

    item.addEventListener('mouseenter', () => {
      submenu.style.display = 'block';
    });

    item.addEventListener('mouseleave', () => {
      submenu.style.display = 'none';
    });
  });
});
