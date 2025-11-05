<?php include('header2.php')?>
<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
  <div class="container">
    <div class="breadcumb-content">
      <h1 class="breadcumb-title" style="color:#fff;">Our Gallery</h1>
      <ul class="breadcumb-menu">
        <li><a href="index.php" style="color:#fff;">Home</a></li>
        <li style="color:#fff;">Our Gallery</li>
      </ul>
    </div>
  </div>
</div>

<!-- ===================== GALLERY TABS ===================== -->
<section class="gallery-nova section" id="gallery-sec">
  <div class="container">
    <!-- Encabezado -->
    <div class="gallery-nova__head text-center" data-aos="fade-up">
      <span class="eyebrow"><i class="far fa-sparkles me-2"></i> Our Gallery</span>
      <h2 class="title">Work We’re Proud</h2>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs gallery-tabs justify-content-center" id="galleryTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab">Images</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab">Videos</button>
      </li>
    </ul>

    <div class="tab-content" id="galleryTabContent">
      <!-- ================== IMAGES ================== -->
      <div class="tab-pane fade show active" id="images" role="tabpanel" aria-labelledby="images-tab">
        <div class="gm-grid uniform-grid">
          <div class="grid-sizer"></div>
          <?php 
          $hasImgs = false;
          for ($i=1; $i<=40; $i++): 
            $cap = $Company." · Project #".$i;
            $thumb = "assets/img/gallery/{$i}.jpg";
            if (file_exists($thumb)) {
              $hasImgs = true;
          ?>
          <figure class="g-item" data-aos="zoom-in" data-aos-delay="<?= $i*50 ?>">
            <a class="g-card popup-image" href="<?= $thumb ?>" data-caption="<?= htmlspecialchars($cap, ENT_QUOTES) ?>">
              <img src="<?= $thumb ?>" alt="<?= htmlspecialchars($cap, ENT_QUOTES) ?>" loading="lazy">
            </a>
          </figure>
          <?php } endfor; ?>

          <?php if(!$hasImgs): ?>
          <div class="empty-gallery text-center" data-aos="fade-up">
            <img src="assets/img/icon/footer_title4.svg" alt="icon" class="empty-icon">
            <h3>Working in Progress</h3>
            <p>Our image gallery will be available soon. Stay tuned!</p>
          </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- ================== VIDEOS ================== -->
      <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
        <div class="gm-grid uniform-grid">
          <?php 
          $hasVideos = false;
          for ($v=1; $v<=6; $v++): 
            $vid = "assets/img/videos/{$v}.mp4";
            if (file_exists($vid)) {
              $hasVideos = true;
          ?>
          <div class="video-card" data-aos="fade-up" data-aos-delay="<?= $v*100 ?>">
            <video controls preload="metadata" data-generate-poster="true">
              <source src="<?= $vid ?>" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
          <?php } endfor; ?>

          <?php if(!$hasVideos): ?>
          <div class="empty-gallery text-center" data-aos="fade-up">
            <img src="assets/img/icon/footer_title4.svg" alt="icon" class="empty-icon">
            <h3>Working in Progress</h3>
            <p>Our video gallery will be available soon. Stay tuned!</p>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Lightbox + Masonry + Poster dinámico -->
<script>
(function ($) {
  $(function () {
    var $grid = $('.gm-grid');

    // Lightbox para imágenes
    if ($.fn.magnificPopup) {
      $('.gallery-nova .popup-image').magnificPopup({
        type: 'image',
        gallery: { enabled: true },
        image: {
          titleSrc: function (item) {
            return item.el.attr('data-caption') || '<?= addslashes($Company ?? "") ?>';
          }
        }
      });
    }

    // Masonry con Isotope
    if ($.fn.isotope && $.fn.imagesLoaded && $grid.length) {
      $grid.imagesLoaded(function () {
        $grid.removeClass('use-columns')
             .addClass('is-ready')
             .isotope({
               itemSelector: '.g-item, .video-card',
               percentPosition: true,
               layoutMode: 'masonry',
               masonry: { columnWidth: '.grid-sizer', gutter: 12 }
             });
      });
    }
  });
})(jQuery);

// Generar posters dinámicos desde el primer segundo
document.querySelectorAll("video[data-generate-poster]").forEach(video => {
  video.addEventListener("loadeddata", () => {
    try { video.currentTime = 1; } catch (e) {}
  });

  video.addEventListener("seeked", () => {
    const canvas = document.createElement("canvas");
    canvas.width = video.videoWidth / 2;
    canvas.height = video.videoHeight / 2;
    const ctx = canvas.getContext("2d");
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    const poster = canvas.toDataURL("image/jpeg");
    video.setAttribute("poster", poster);

    video.currentTime = 0; // regresar al inicio
    video.pause();
  }, { once: true });
});
</script>

<style>
/* Tabs */
.gallery-tabs {margin:30px 0;gap:10px;}
.gallery-tabs .nav-link {
  font:600 1rem var(--body-font,Inter);
  padding:10px 20px;
  border-radius:30px;
  border:1px solid #ddd;
}
.gallery-tabs .nav-link.active {
  background:#00265A;
  color:#fff;
  border-color:#00265A;
}

/* Grids */
.uniform-grid {
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
  gap:20px;
  margin-top:30px;
}
.uniform-grid img,
.uniform-grid video {
  width:100%;
  aspect-ratio:16/9;
  object-fit:cover;
  border-radius:14px;
  box-shadow:0 6px 14px rgba(0,0,0,.1);
  transition:.3s;
  display:block;
}
.uniform-grid img:hover,
.uniform-grid video:hover {transform:scale(1.02);}

/* Empty State */
.empty-gallery {
  grid-column:1/-1;
  padding:50px 20px;
  text-align:center;
  color:#444;
}
.empty-gallery .empty-icon {
  width:60px;
  margin-bottom:15px;
  opacity:0.7;
}
.empty-gallery h3 {font:700 1.4rem/1.3 var(--title-font,Exo);}
.empty-gallery p {font:400 1rem/1.6 var(--body-font,Inter);}
</style>

<?php include('footer.php')?>
