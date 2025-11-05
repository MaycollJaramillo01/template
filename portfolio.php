<?php
$activeNav = 'Gallery';
$homePath = '/home-1';
$page_name = 'portfolio.php';
$namepage = 'Portfolio';
require __DIR__ . '/partials/header-secondary.php';
?>

<section class="breadcrumb_section text-center section_padding">
    <ul class="breadcrumb"><br class="visible-xs"><br class="visible-xs">
        <li><a href="/home-1">Home</a></li>
        <li class="text-white responblack"> Portfolio</li>
    </ul>
    <h1 class="text-white responblack">Recent Works</h1>
</section>

<section class="about_style_3_area section_padding padportfolio">
  <div class="container">
    <div class="row text-center">
      <?php for ($i = 218; $i >= 1; $i--) :
        $full = "assets/images/gallery/full/{$i}.jpg";
        $thumb = "assets/images/gallery/min/{$i}.jpg";
        if (!file_exists($thumb)) {
            continue;
        }
        $caption = sprintf('%s project #%d', $Company ?? 'Project', $i);
        $captionEsc = htmlspecialchars($caption, ENT_QUOTES, 'UTF-8');
      ?>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gallery-space">
          <a class="example-image" href="<?= $full ?>" data-lightbox="example-set" data-title="<?= $captionEsc ?>">
            <img class="img-thumbnail wow zoomIn" src="<?= $thumb ?>" alt="<?= nova_img_alt($caption, 'Portfolio project image', $Company ?? ''); ?>"/>
          </a>
        </div>
      <?php endfor; ?>
    </div>
    <div>
    <div class="row text-center">
      <?php for ($i = 3; $i >= 1; $i--) :
        $poster = "assets/video/font_page/{$i}.jpg";
        $video  = "assets/video/full/{$i}.mp4";
        if (!file_exists($poster)) {
            continue;
        }
        $videoCaption = sprintf('%s video project #%d', $Company ?? 'Project', $i);
        $videoCaptionEsc = htmlspecialchars($videoCaption, ENT_QUOTES, 'UTF-8');
      ?>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gallery-space">
          <a class="example-video" href="<?= $video ?>" data-lightbox="example-set" data-title="<?= $videoCaptionEsc ?>">
            <img class="img-thumbnail wow zoomIn" src="<?= $poster ?>" alt="<?= nova_img_alt($videoCaption, 'Portfolio video thumbnail', $Company ?? ''); ?>"/>
          </a>
        </div>
      <?php endfor; ?>
    </div>
    </div><br><hr>
    <div class="row text-center">
      <h1 class="text-center text-black fontsize">Videos</h1><br>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
           <iframe width="100%" height="450" src="https://www.youtube.com/embed/g180zT695nw" title="2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
           <iframe width="100%" height="450" src="https://www.youtube.com/embed/4IYQ5hKmcaE" title="1 2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
           <iframe width="100%" height="450" src="https://www.youtube.com/embed/HAkZfgvk3U8" title="11" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
           <iframe width="100%" height="450" src="https://www.youtube.com/embed/f9A19FFn2ag" title="10" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
           <iframe width="100%" height="450" src="https://www.youtube.com/embed/bc2tIEmqhZw" title="9" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
           <iframe width="100%" height="450" src="https://www.youtube.com/embed/Ydho8J5DbZ0" title="8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
          <iframe width="100%" height="450" src="https://www.youtube.com/embed/qwV41HqjnsY" title="6" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
           <iframe width="100%" height="450" src="https://www.youtube.com/embed/blf2gZfsJGI" title="7" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
           <iframe width="100%" height="450" src="https://www.youtube.com/embed/0pQfF70fvOM" title="5" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
           <iframe width="100%" height="450" src="https://www.youtube.com/embed/roIy84hAoh4" title="4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
          <iframe width="100%" height="450" src="https://www.youtube.com/embed/Gz_gUmqoFOI" title="20" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
          <iframe width="100%" height="450" src="https://www.youtube.com/embed/mwdncWWrPFc" title="19" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
          <iframe width="100%" height="450" src="https://www.youtube.com/embed/IVUB16a5ypU" title="18" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
          <iframe width="100%" height="450" src="https://www.youtube.com/embed/U1he_1K2QaY" title="16" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
          <iframe width="100%" height="450" src="https://www.youtube.com/embed/NZtHGFynkho" title="15" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
          <iframe width="100%" height="450" src="https://www.youtube.com/embed/SFiDoaRd0tM" title="14" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
          <iframe width="100%" height="450" src="https://www.youtube.com/embed/yDann0UBfEs" title="13" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-space">
          <iframe width="100%" height="450" src="https://www.youtube.com/embed/7-gutPO4gSk" title="3" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

    </div>
  </div>
</section>
<?php require __DIR__ . '/partials/footer.php'; ?>
