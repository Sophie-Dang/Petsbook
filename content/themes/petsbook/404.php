<?php get_header(); ?>

<div class="error">
      <img class="error__img" src="<?= get_theme_file_uri('public/images/Illu-2.png') ?>" alt="404" >
      <h1 class="error__title">Page non trouvée</h1>
      <p>Vous pouvez <a href="<?= home_url('/') ?>">retourner à l'accueil</a></p>

    </div>

<?php get_footer(); ?>
