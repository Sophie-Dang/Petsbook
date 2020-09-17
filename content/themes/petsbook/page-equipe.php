<?php get_header(); ?>

<div class="main-items">
    <h1 class="team__title"> L'équipe </h1>
    <section class="main-timelines team-items">
      <?php 

        $args = [
        'post_type' => 'team',
        'orderby' => 'rand',
        ];
    
        $teamQuery = new WP_Query($args);

      ?>

      <?php if($teamQuery->have_posts()) : while($teamQuery->have_posts()) : $teamQuery->the_post(); ?>
        <?php get_template_part('template-parts/team-posts') ?>
      <?php endwhile; endif; wp_reset_query(); ?>
    </section>
</div>

<?php get_footer(); ?>

