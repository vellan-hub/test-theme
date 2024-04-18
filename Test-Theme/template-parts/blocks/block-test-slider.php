<?php
  $heading = get_field('heading');
  $content = get_field('content');
  $keyword = get_field('keyword');
  $image_count = get_field('image_count');
  $orientation = get_field('orientation');

  wp_enqueue_style('block-test-slider', get_template_directory_uri() . '/dist/css/index.min.css');
  wp_enqueue_script('block-test-slider', get_template_directory_uri() . '/dist/js/index.js');
?>


<?php 
require get_template_directory() . '/vendor/autoload.php';

Unsplash\HttpClient::init([
	'applicationId'	=> 'mFiMmP3bIpYjK3oRHrZ_HjMexwS6-Wk7qWNhNazAnzk',
	'secret'	=> 'y36y8eTAhYZMqNBPUkUArcwsecNq4lhz7NzvDIIYhEk',
	'callbackUrl'	=> 'https://your-application.com/oauth/callback',
	'utmSource' => 'example'
]);

$search = $keyword;
$page = 1;
$per_page = $image_count;
$orientation = $orientation;

$photos = Unsplash\Search::photos($search, $page, $per_page, $orientation);

$results = $photos->getResults();

set_transient( 'query_results', $results, 12 * HOUR_IN_SECONDS );
?>

<section class="block-studio-slider section bg_dark">
  <div class="container mobile-full">

    <?php if (!empty($heading)) : ?>
      <div class="heading">
        <?= $heading; ?>
      </div>
    <?php endif; ?>

    <div class="swiper studio-swiper">
      <div class="swiper-wrapper">

        <?php foreach ($results as $photo) : ?>
          <?php if (!empty($photo['urls']['small'])) : ?>
            <div class="swiper-slide">
              <img src="<?= $photo['urls']['small']; ?>" alt="">
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
        
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper_bottom">
        <div class="column_left">

          <?php if (!empty($content)) : ?>
            <div class="text__wrapper">
              <?= $content; ?>
            </div>
          <?php endif; ?>

        </div>
        <div class="column_right">
          <div class="navigation__wrapper">
            <div class="swiper-button-prev">
              <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
                <g opacity="0.6">
                  <path d="M21.5 27.134C20.8333 27.5189 20.8333 28.4811 21.5 28.866L30.5 34.0622C31.1667 34.4471 32 33.966 32 33.1962L32 22.8038C32 22.034 31.1667 21.5529 30.5 21.9378L21.5 27.134Z" fill="#D9D9D9"/>
                  <rect x="0.5" y="0.5" width="55" height="55" rx="27.5" stroke="white"/>
                </g>
              </svg>
            </div>
            <div class="swiper-button-next">
              <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
                <g opacity="0.6">
                  <path d="M34.5 27.134C35.1667 27.5189 35.1667 28.4811 34.5 28.866L25.5 34.0622C24.8333 34.4471 24 33.966 24 33.1962L24 22.8038C24 22.034 24.8333 21.5529 25.5 21.9378L34.5 27.134Z" fill="#D9D9D9"/>
                  <rect x="0.5" y="0.5" width="55" height="55" rx="27.5" stroke="white"/>
                </g>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

