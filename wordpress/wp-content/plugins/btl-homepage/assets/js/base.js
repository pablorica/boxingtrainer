/* BTL Site 2026 — base.js
   Shared header behaviour for every BTL template.
   Loaded before the per-template script on all BTL templates. */

/* Mobile menu */
(function () {
  var btn = document.getElementById('btl-burger');
  var panel = document.getElementById('btl-mobile-menu');
  if (!btn || !panel) return;

  function setOpen(open) {
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    btn.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    document.body.classList.toggle('menu-open', open);
    if (open) {
      panel.hidden = false;
      requestAnimationFrame(function () { panel.classList.add('is-open'); });
    } else {
      panel.classList.remove('is-open');
      setTimeout(function () { if (btn.getAttribute('aria-expanded') === 'false') panel.hidden = true; }, 250);
    }
  }

  btn.addEventListener('click', function () {
    setOpen(btn.getAttribute('aria-expanded') !== 'true');
  });

  panel.addEventListener('click', function (e) {
    if (e.target.tagName === 'A') setOpen(false);
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && btn.getAttribute('aria-expanded') === 'true') {
      setOpen(false);
      btn.focus();
    }
  });

  window.addEventListener('resize', function () {
    if (window.innerWidth > 900 && btn.getAttribute('aria-expanded') === 'true') setOpen(false);
  });
})();

/* Hide-on-scroll header */
(function () {
  var header = document.querySelector('header');
  if (!header) return;

  var lastY = window.pageYOffset;
  var ticking = false;
  var DELTA = 8;        // ignore tiny jitters
  var TOP_ZONE = 80;    // always show near the very top

  function update() {
    var y = window.pageYOffset;
    var menuOpen = document.body.classList.contains('menu-open');

    header.classList.toggle('is-stuck', y > TOP_ZONE);

    if (menuOpen || y <= TOP_ZONE) {
      header.classList.remove('is-hidden');           // never hide at top or with menu open
    } else if (Math.abs(y - lastY) > DELTA) {
      header.classList.toggle('is-hidden', y > lastY); // down = hide, up = show
    }

    lastY = y;
    ticking = false;
  }

  window.addEventListener('scroll', function () {
    if (!ticking) { ticking = true; requestAnimationFrame(update); }
  }, {passive: true});

  update();
})();
