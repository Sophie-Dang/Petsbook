<div class="main-timelines__item team-items__item">
    <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>-picture" class="main-timelines__item__img">
    <h3 class="main-timelines__item__title team-items__item__title"><?php the_title() ?></h3>
    <div class="main-timelines__item__text team-items__item__text"><?php the_content() ?></div>
</div>