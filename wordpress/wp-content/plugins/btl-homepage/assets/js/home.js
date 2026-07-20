/* BTL Homepage 2026 — behaviour from the approved mockup */
// Poster-first video facade: YouTube loads only on click (same pattern as production build)
(function () {
  var v = document.getElementById('geri-video');
  if (!v || !v.dataset.videoId) return;

  var player = null;

  function loadApi(cb) {
    if (window.YT && window.YT.Player) return cb();
    var prev = window.onYouTubeIframeAPIReady;
    window.onYouTubeIframeAPIReady = function () {
      if (typeof prev === 'function') prev();
      cb();
    };
    if (!document.getElementById('btl-yt-api')) {
      var s = document.createElement('script');
      s.id = 'btl-yt-api';
      s.src = 'https://www.youtube.com/iframe_api';
      document.head.appendChild(s);
    }
  }

  function play() {
    if (v.querySelector('iframe')) return;
    v.classList.add('has-video', 'is-playing');

    var f = document.createElement('iframe');
    f.id = 'btl-yt-player';
    f.src = 'https://www.youtube-nocookie.com/embed/' + v.dataset.videoId +
            '?autoplay=1&rel=0&enablejsapi=1&origin=' + encodeURIComponent(location.origin);
    f.allow = 'autoplay; encrypted-media; picture-in-picture';
    f.allowFullscreen = true;
    v.appendChild(f);

    // Overlays return on pause/end
    loadApi(function () {
      player = new YT.Player('btl-yt-player', {
        events: {
          onStateChange: function (e) {
            var playing = e.data === YT.PlayerState.PLAYING || e.data === YT.PlayerState.BUFFERING;
            v.classList.toggle('is-playing', playing);
          }
        }
      });
    });
  }

  v.addEventListener('click', play);
  v.addEventListener('keydown', function (e) {
    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); play(); }
  });
})();

(function () {
  var hero = document.querySelector('.hero');
  var heroImage = document.querySelector('.hero-media img');

  if (!hero || !heroImage) return;

  /*
    The text remains visible when JavaScript is disabled.
    We only hide it after confirming JavaScript is running.
  */
  hero.classList.add('hero-enhanced');

  function revealHero() {
    window.setTimeout(function () {
      hero.classList.add('hero-ready');
    }, 550);
  }

  if (heroImage.complete) {
    revealHero();
  } else {
    heroImage.addEventListener('load', revealHero, { once: true });

    /*
      Fallback: never leave the content hidden if the image fails.
    */
    heroImage.addEventListener('error', function () {
      hero.classList.add('hero-ready');
    }, { once: true });
  }
})();

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
