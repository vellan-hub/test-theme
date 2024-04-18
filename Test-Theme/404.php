<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Front-theme
 */

get_header();
?>

<main>

  <section class="not-found">
    <div class="not-found__container">
      <div class="not-found__wrapper">
        <div class="img__wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/404.svg" alt="">
        </div>
        <p class="title">Ооопс... страница не найдена</p>
        <p class="description">Запрашиваемая вами страница в интернете недоступна в данный момент и содержание страницы проверить невозможно.</p>
        <a href="/" class="back-to-main">Вернуться на главную</a>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
