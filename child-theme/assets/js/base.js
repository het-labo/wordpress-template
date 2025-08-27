/* No scroll blocking on page laod */
window.addEventListener('DOMContentLoaded', () => {
  document.body.style.overflowY = 'visible';
});


// Add top padding to page equal to header height ( !home )
document.addEventListener("DOMContentLoaded", function () {
  const body = document.body;

  // Skip if body has class "home"
  if (!body.classList.contains("home")) {
    const header = document.querySelector(".site-header");

    if (header) {
      const headerHeight = header.offsetHeight;
      body.style.paddingTop = headerHeight + "px";
    }
  }
});
