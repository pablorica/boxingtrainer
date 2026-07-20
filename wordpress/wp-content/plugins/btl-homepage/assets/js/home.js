/* BTL Homepage 2026 — behaviour from the approved mockup */
// Poster-first video facade: YouTube loads only on click (same pattern as production build)
(function () {
  var v = document.getElementById('geri-video');
  if (!v || !v.dataset.videoId) return;
  function play() {
    if (v.querySelector('iframe')) return;
    var f = document.createElement('iframe');
    f.src = 'https://www.youtube-nocookie.com/embed/' + v.dataset.videoId + '?autoplay=1&rel=0';
    f.allow = 'autoplay; encrypted-media; picture-in-picture';
    f.allowFullscreen = true;
    v.appendChild(f);
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
