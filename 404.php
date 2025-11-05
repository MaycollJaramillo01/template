<!-- ============ Swiper Assets (necesarios) ============ -->
<link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>

<!--==============================
    Client Area (Real brand SVGs)
===============================-->
<section class="client-area-1 pt-60 pb-60 overflow-hidden gray-bg position-relative">
  <style>
    /* -- estilos del carrusel de marcas -- */
    .client-card{
      display:flex; flex-direction:column; justify-content:center; align-items:center;
      height:180px; text-decoration:none; gap:10px;
      transition:transform .2s ease, box-shadow .2s ease; border-radius:14px;
      background: #fff;
    }
    .client-card:hover{ transform:translateY(-3px); box-shadow:0 10px 24px rgba(0,0,0,.2); }
    .brand-svg{ width:72px; height:72px; display:block; }
    .client-label{ font-size:18px; color:#fff; }

    /* Opcional: centrar el subt铆tulo si tu theme lo desalineara */
    .section__title .sub-title{ display:inline-block; text-align:center; width:100%; }
  </style>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="section__title text-center mb-30">
          <span class="sub-title text-white text-anim fw-normal lh-normal lh-base">We Value Your Opinion</span>
        </div>
      </div>
    </div>

    <!-- Cambiamos a clase .swiper (requerida por Swiper v7+) -->
    <div class="tg-swiper__slider swiper client-slider1" id="clientSlider1">
      <div class="swiper-wrapper">

        <!-- Google Business -->
        <div class="swiper-slide">
          <a href="<?php echo $gbp; ?>" class="client-card" target="_blank" aria-label="Google Business" rel="noopener">
            <svg class="brand-svg" viewBox="0 0 256 262" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true">
              <path fill="#4285F4" d="M255.9 133.5c0-10.7-.9-18.5-2.9-26.6H130v48.4h71.9c-1.5 12-9.6 30-27.5 42.1l-.25.17 39.9 31c36.8-34 41.8-83.9 41.8-95.1z"/>
              <path fill="#34A853" d="M130 261.1c36.5 0 67.1-12 89.5-32.7l-42.7-33.2c-11.4 8-26.6 13.6-46.8 13.6-35.8 0-66.2-24.1-77.1-56.9l-.16.01-43.9 34.0-.57.13C32.9 229.9 77.9 261.1 130 261.1z"/>
              <path fill="#FBBC05" d="M52.9 151.9c-2.9-8.1-4.6-16.8-4.6-25.9 0-9.1 1.7-17.8 4.5-25.9l-.08-.17-44.2-34.2-.46.22C1.6 82.7 0 101.2 0 120.9c0 19.7 1.6 38.2 8.1 55.5l44.8-34.5z"/>
              <path fill="#EA4335" d="M130 50.9c25.4 0 42.5 11 52.3 20.2l38.2-37.4C196.8 12.3 166.4 0 130 0 77.9 0 32.9 31.2 8.3 76.4l44.6 34c10.9-32.8 41.3-59.5 77.1-59.5z"/>
            </svg>
            <span class="client-label" style="color: #000;">Google Business</span>
          </a>
        </div>

        <!-- TikTok -->
        <div class="swiper-slide">
          <a href="<?php echo $tiktok; ?>" class="client-card" target="_blank" aria-label="TikTok" rel="noopener">
            <svg class="brand-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true">
              <path fill="#000000" d="M160 0v146.7c0 25.1-20.4 45.5-45.5 45.5S69 171.8 69 146.7 89.4 101.2 114.5 101.2c5.6 0 10.9 1 15.8 2.8V63.3c-5.2-.8-10.5-1.3-15.8-1.3-45.5 0-82.4 36.9-82.4 82.4S68.9 227 114.5 227s82.4-36.9 82.4-82.4V76.1c11.7 9.1 26.3 15.5 43.1 17.2V60.2c-16.7-4-30.9-12.9-40.7-24.8C187.7 22.7 181.6 11.9 178 0h-18z"/>
              <path fill="#69C9D0" d="M160 0v55.4c17.1 13.3 27.9 18.7 46.2 21.2V60.2c-16.7-4-30.9-12.9-40.7-24.8C161.9 24.2 160 0 160 0z"/>
              <path fill="#EE1D52" d="M130.3 103.7c-4.9-1.8-10.2-2.8-15.8-2.8-25.1 0-45.5 20.4-45.5 45.5 0 2.8.25 5.5.72 8.1 4.6-20.8 23.2-36.4 45.3-36.4 5.6 0 10.9 1 15.8 2.8v-17.2z"/>
            </svg>
            <span class="client-label" style="color: #000;">TikTok</span>
          </a>
        </div>

        <!-- Networx (similar en color de marca) -->
        <div class="swiper-slide">
          <a href="<?php echo $network; ?>" class="client-card" target="_blank" aria-label="Networx" rel="noopener">
            <svg class="brand-svg" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true">
              <defs>
                <linearGradient id="nx" x1="0" x2="1" y1="0" y2="1">
                  <stop offset="0" stop-color="#FF6A00"/>
                  <stop offset="1" stop-color="#FF8E3C"/>
                </linearGradient>
              </defs>
              <rect x="8" y="8" width="104" height="104" rx="20" fill="url(#nx)"/>
              <path d="M35 80V40h10l18 24V40h12v40H64L46 56v24H35z" fill="#ffffff"/>
            </svg>
            <span class="client-label" style="color: #000;">Networx</span>
          </a>
        </div>

        <!-- Google Maps -->
        <div class="swiper-slide">
          <a href="<?php echo $google; ?>" class="client-card" target="_blank" aria-label="Google Maps" rel="noopener">
            <svg class="brand-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true">
              <path fill="#EA4335" d="M128 244s76-86 76-140C204 60.5 169.6 26 128 26S52 60.5 52 104c0 54 76 140 76 140z"/>
              <circle cx="128" cy="104" r="44" fill="#34A853"/>
              <path fill="#FBBC05" d="M128 60a44 44 0 0 1 44 44h-44V60z"/>
              <path fill="#4285F4" d="M172 104a44 44 0 0 1-44 44v-44h44z"/>
            </svg>
            <span class="client-label" style="color: #000;" >Google Maps</span>
          </a>
        </div>

        <!-- Facebook -->
        <div class="swiper-slide">
          <a href="<?php echo $face; ?>" class="client-card" target="_blank" aria-label="Facebook" rel="noopener">
            <svg class="brand-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true">
              <rect width="256" height="256" rx="56" fill="#1877F2"/>
              <path d="M168 88h-24c-8.8 0-16 7.2-16 16v20h40l-6 40h-34v72h-40v-72H72v-40h16v-22c0-25.4 20.6-46 46-46h34v32z" fill="#fff"/>
            </svg>
            <span class="client-label" style="color: #000;" >Facebook</span>
          </a>
        </div>

        <!-- Instagram -->
        <div class="swiper-slide">
          <a href="<?php echo $instagram; ?>" class="client-card" target="_blank" aria-label="Instagram" rel="noopener">
            <svg class="brand-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true">
              <defs>
                <linearGradient id="ig" x1="0" x2="1" y1="0" y2="1">
                  <stop offset="0%" stop-color="#F58529"/>
                  <stop offset="30%" stop-color="#FEDA77"/>
                  <stop offset="60%" stop-color="#DD2A7B"/>
                  <stop offset="100%" stop-color="#8134AF"/>
                </linearGradient>
              </defs>
              <rect width="256" height="256" rx="60" fill="url(#ig)"/>
              <circle cx="128" cy="128" r="46" fill="none" stroke="#fff" stroke-width="20"/>
              <circle cx="180" cy="76" r="14" fill="#fff"/>
            </svg>
            <span class="client-label" style="color: #000;">Instagram</span>
          </a>
        </div>

      </div>

      <!-- Controles opcionales -->
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev" style="color:#fff;"></div>
      <div class="swiper-button-next" style="color:#fff;"></div>
    </div>
  </div>
</section>

<!-- ============ Inicializaci贸n Swiper ============ -->
<script>
  (function () {
    function initClientSwiper(){
      if (typeof Swiper === 'undefined') return;
      new Swiper('#clientSlider1', {
        loop: true,
        speed: 600,
        grabCursor: true,
        autoplay: { delay: 1500, disableOnInteraction: false },
        spaceBetween: 30,
        slidesPerView: 1,
        breakpoints: {
          600:  { slidesPerView: 2, spaceBetween: 30 },
          1200: { slidesPerView: 3, spaceBetween: 18 }
        },
        observer: true,
        observeParents: true,
        pagination: { el: '#clientSlider1 .swiper-pagination', clickable: true },
        navigation: {
          nextEl: '#clientSlider1 .swiper-button-next',
          prevEl: '#clientSlider1 .swiper-button-prev'
        }
      });
      // Ajuste si se carga en tabs/accordions de Elementor
      setTimeout(() => { window.dispatchEvent(new Event('resize')); }, 400);
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initClientSwiper);
    } else {
      initClientSwiper();
    }
  })();
</script>
