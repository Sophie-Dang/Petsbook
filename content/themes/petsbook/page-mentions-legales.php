<?php get_header(); ?>



<?php
 
// checks if there are any posts that match the query
if (have_posts()) :
 
  // If there are posts matching the query then start the loop
  while ( have_posts() ) : the_post(); ?>
  <h1 class="legal-mentions"><?php the_title(); ?></h1>
  <div class="info-animal-wrapper legal-mentions-wrap"> 
        <section class="form__pet__infos legal-mentions-wrap__border">
             
                <div class="form__pet__infos__animal legal-mentions-wrap__border__content">
                <?php the_content(); ?>
                </div>
        </section>

    </div>
 
<?php 
  endwhile; 
endif;?>


<?php get_footer(); ?>