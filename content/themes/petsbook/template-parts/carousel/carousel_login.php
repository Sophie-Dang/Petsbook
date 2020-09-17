<section class="main-slide">
  
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="<?= get_theme_mod('petsbook_carousel_login_interval')?>">
        <!--A modifier-->
        <img class="carousel-item-bg" src="https://source.unsplash.com/user/detpho/nOlrlCUNvVg/1920x3000" class="d-block w-100" alt="...">

        <div class="carousel-item-content">

          <div class="carousel-item-content-part">
            <img class="carousel-item-content-part__illu" src="<?= wp_get_attachment_url(get_theme_mod('petsbook_carousel_login_slide1_Illu')) ?>" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item-content-part__description">
              <h5 class="carousel-item-content-part__description__title"><?= get_theme_mod('petsbook_carousel_login_slide1_title')?></h5>
              <p class="carousel-item-content-part__description__text"><?= get_theme_mod('petsbook_carousel_login_slide1_content')?></p>
            </div>
          </div>
      </div>
      
      <div class="carousel-item" data-interval="<?= get_theme_mod('petsbook_carousel_login_interval')?>">
        <!--A modifier-->
        <img class="carousel-item-bg" src="https://source.unsplash.com/user/detpho/nOlrlCUNvVg/1920x3000" class="d-block w-100" alt="...">

        <div class="carousel-item-content">

          <div class="carousel-item-content-part">
            <img class="carousel-item-content-part__illu" src="<?= wp_get_attachment_url(get_theme_mod('petsbook_carousel_login_slide2_Illu'))?>" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item-content-part__description">
              <h5 class="carousel-item-content-part__description__title"><?= get_theme_mod('petsbook_carousel_login_slide2_title')?></h5>
              <p class="carousel-item-content-part__description__text"><?= get_theme_mod('petsbook_carousel_login_slide2_content')?></p>
            </div>
          </div>
      </div>

      <div class="carousel-item" data-interval="<?= get_theme_mod('petsbook_carousel_login_interval')?>">
        <!--A modifier-->
        <img class="carousel-item-bg" src="https://source.unsplash.com/user/detpho/nOlrlCUNvVg/1920x3000" class="d-block w-100" alt="...">

        <div class="carousel-item-content">

          <div class="carousel-item-content-part">
            <img class="carousel-item-content-part__illu" src="<?= wp_get_attachment_url(get_theme_mod('petsbook_carousel_login_slide3_Illu')); ?>" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item-content-part__description">
              <h5 class="carousel-item-content-part__description__title"><?= get_theme_mod('petsbook_carousel_login_slide3_title')?></h5>
              <p class="carousel-item-content-part__description__text"><?= get_theme_mod('petsbook_carousel_login_slide3_content')?></p>
            </div>
          </div>
      </div>
    <!--Next/Previous-->
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/Next/Previous-->
  </div>

</section>
