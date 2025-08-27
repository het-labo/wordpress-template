const overlay = document.querySelector('#app-overlay');

const menus = {
  mobile: document.querySelector('aside[data-menu="mobile"]'),
  left: document.querySelector('aside[data-menu="left"]'),
  right: document.querySelector('aside[data-menu="right"]')
};

function setMenu(menu, open, side) {
  if (!menu) return;
  menu.setAttribute('aria-modal', open ? 'true' : 'false');
  if (side === 'left') menu.style.left = open ? '0' : '-375px';
  if (side === 'right') menu.style.right = open ? '0' : '-375px';
  updateUI();
}

function updateUI() {
  const anyOpen = Object.values(menus).some(m => m && m.getAttribute('aria-modal') === 'true');
  document.body.style.overflowY = anyOpen ? 'hidden' : 'visible';
  if (overlay) {
    overlay.setAttribute('aria-hidden', !anyOpen);
    overlay.style.opacity = anyOpen ? '1' : '0';
  }
}

function closeAll() {
  Object.entries(menus).forEach(([side, m]) => {
    if (!m) return;
    m.setAttribute('aria-modal', 'false');
    if (side === 'left') m.style.left = '-375px';
    if (side === 'right') m.style.right = '-375px';
  });
  updateUI();
}

document.addEventListener('click', e => {
  // Toggle mobile menu
  const mobileBtn = e.target.closest('[data-menu="mobile"][data-menu-action="toggle"], button[data-menu="mobile"][data-menu-action="toggle"]');
  if (mobileBtn) {
    e.preventDefault();
    const isOpen = menus.mobile.getAttribute('aria-modal') === 'true';
    setMenu(menus.mobile, !isOpen);
    return;
  }

  // Toggle/close left/right menu
  const sideBtn = e.target.closest('[data-menu-action]');
  if (sideBtn && sideBtn.dataset.menuSide && sideBtn.dataset.menuAction) {
    e.preventDefault();
    const side = sideBtn.dataset.menuSide;
    const menu = menus[side];
    const isOpen = menu.getAttribute('aria-modal') === 'true';
    setMenu(menu, sideBtn.dataset.menuAction === 'toggle' ? !isOpen : false, side);
    return;
  }

  // Overlay click closes all
  if (overlay && e.target === overlay) closeAll();
});
