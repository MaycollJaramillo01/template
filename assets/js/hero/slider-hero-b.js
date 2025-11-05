(function () {
  const init = function () {
    if (typeof Swiper === 'undefined') {
      return;
    }

    document.querySelectorAll('.js-hero-slider-b').forEach(function (sliderEl) {
      const paginationEl = sliderEl.querySelector('.swiper-pagination');
      const prevEl = sliderEl.querySelector('.hero-b__nav--prev');
      const nextEl = sliderEl.querySelector('.hero-b__nav--next');
      const delayAttr = sliderEl.getAttribute('data-autoplay-delay');
      const delay = delayAttr ? parseInt(delayAttr, 10) : 6000;

      new Swiper(sliderEl, {
        effect: 'slide',
        speed: 800,
        loop: true,
        autoplay: {
          delay: isNaN(delay) ? 6000 : delay,
          disableOnInteraction: false,
        },
        pagination: {
          el: paginationEl,
          clickable: true,
        },
        navigation: {
          prevEl: prevEl,
          nextEl: nextEl,
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
