<div class="main-timelines__item">
    <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>-picture" class="main-timelines__item__img">
    <h3 class="main-timelines__item__title"><?php the_title() ?></h3>
    <div class="main-timelines__item__text"><?php the_excerpt() ?></div>
    <div class="main-timelines__item__button-container">
        <a href="<?php the_permalink() ?>" class="main-timelines__item__button">Voir</a>
    </div>
</div>