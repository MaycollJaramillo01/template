(function () {
  const init = function () {
    if (typeof Swiper === 'undefined') {
      return;
    }

    document.querySelectorAll('.js-hero-slider-c').forEach(function (sliderEl) {
      const paginationEl = sliderEl.querySelector('.swiper-pagination');
      const delayAttr = sliderEl.getAttribute('data-autoplay-delay');
      const delay = delayAttr ? parseInt(delayAttr, 10) : 6500;

      new Swiper(sliderEl, {
        effect: 'fade',
        fadeEffect: { crossFade: true },
        loop: true,
        speed: 900,
        autoplay: {
          delay: isNaN(delay) ? 6500 : delay,
          disableOnInteraction: false,
        },
        pagination: {
          el: paginationEl,
          clickable: true,
        },
        slidesPerView: 1,
      });
    });
  };

  if (document.readyState === 'complete' || document.readyState === 'interactive') {
    init();
  } else {
    document.addEventListener('DOMContentLoaded', init);
  }
})();
