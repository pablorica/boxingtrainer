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
  var heroImage = document.querySelector('.hero-media img');

  if (!hero || !heroImage) return;

  /*
    The text remains visible when JavaScript is disabled.
    We only hide it after confirming JavaScript is running.
    No working well in remote, so we put 'hero-enhanced' harcoded in the HTML tag
    //hero.classList.add('hero-enhanced');
  */
  

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
