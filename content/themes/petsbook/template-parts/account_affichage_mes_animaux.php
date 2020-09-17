<?php 
$current_user = wp_get_current_user();

$wp_query = new WP_Query(
    array(
        'post_type' => 'animal',
        'author__in' => $current_user->ID // pour que sur l'account général de chacun on ne voit que ses propres animaux
        
    )
) ?>

<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
        <div class="animals__profiles__all__wrapper">                  
            <a href="?pet=<?= get_the_ID(); ?>">
            <img class='animals__profiles__all__wrapper__image'
            src="<?= get_the_post_thumbnail_url(); ?>" />   
            <p class='animals__profiles__all__wrapper__name'><?php the_title(); ?></p>
            </a>               
        </div>
<?php endwhile; wp_reset_query(); ?>