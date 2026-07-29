/* BTL Site 2026 — home.js
   Homepage-only behaviour. Menu + scroll header live in base.js. */

/* Poster-first video facade: YouTube loads only on click */
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

/* Hero reveal */
(function () {
  var hero = document.querySelector('.hero');
  var heroMedia = document.querySelector('.hero-media');

  if (!hero || !heroMedia) return;

  // .js on <html> already applies the pre-animation state from first paint;
  // this class is kept only for backwards compatibility and is now cosmetic.
  hero.classList.add('hero-enhanced');

  var revealed = false;
  var revealTimer;

  function revealHero(delay) {
    if (revealed) return;

    window.clearTimeout(revealTimer);

    revealTimer = window.setTimeout(function () {
      if (revealed) return;

      revealed = true;
      hero.classList.add('hero-ready');
    }, delay || 0);
  }

  function forceRevealHero() {
    if (revealed) return;

    window.clearTimeout(revealTimer);

    revealed = true;
    hero.classList.add('hero-ready');
  }

  function watchImage(image) {
    if (!image) return;

    if (image.complete && image.naturalWidth > 0) {
      revealHero(100);
      return;
    }

    image.addEventListener('load', function () {
      revealHero(100);
    }, { once: true });

    image.addEventListener('error', forceRevealHero, { once: true });
  }

  watchImage(heroMedia.querySelector('img'));

  var observer = new MutationObserver(function () {
    var image = heroMedia.querySelector('img');

    watchImage(image);

    if (image && image.complete && image.naturalWidth > 0) {
      observer.disconnect();
    }
  });

  observer.observe(heroMedia, {
    childList: true,
    subtree: true,
    attributes: true,
    attributeFilter: [
      'src',
      'srcset',
      'data-src',
      'data-srcset'
    ]
  });

  /*
   * Never keep the hero hidden for more than 1.2 seconds,
   * even if NitroPack delays the image.
   */
  window.setTimeout(function () {
    observer.disconnect();
    forceRevealHero();
  }, 1200);
})();