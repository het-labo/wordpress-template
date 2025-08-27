const body = document.body;

const update = () => {
  const y = scrollY;
  body.classList.toggle('mod--is-scrolled', y > 1);
  body.classList.toggle('mod--is-scrolled-heavy', y > 500);
};

let ticking = false;
const onEvent = () => {
  if (!ticking) {
    requestAnimationFrame(() => {
      update();
      ticking = false;
    });
    ticking = true;
  }
};

addEventListener('scroll', onEvent, { passive: true });
update(); // run once on load
