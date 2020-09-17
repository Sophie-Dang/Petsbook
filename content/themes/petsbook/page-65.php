<!--HOMEPAGE LOGIN-->
<?php if(is_user_logged_in()) : ?>
<?php get_header(); ?>

<?php if(get_theme_mod('petsbook_carousel_login_active')) : ?>
  <?php get_template_part('template-parts/carousel/carousel_login'); ?>
<?php endif; ?>

<div class="main-items-l">
  <!--Pet Icons-->
  <section class="main-pet-icons">
   
    <?php
      // Définition de la taxonomie ciblée
      $tax = 'animal-type';
      // Récupération de la liste des termes de la taxonomie 'animal-type' | 'hide_empty' => false, permet de visualiser tous les termes même s'ils ont un total de post de 0
      $terms = get_terms($tax,array('hide_empty' => false)); 
      //var_dump($terms);
    
      foreach($terms as $term):
      //var_dump($term->term_id);

      // On stocke dans une variable la récupération du champs 'term_thumbnail' crée via ACF dans le BO, on précise le terme
      $term_thumbnail = get_field('term_thumbnail', $term);

      //var_dump(get_term_link($term, $tax));
    ?>
    
      <div class="main-pet-icons__icon">
        <a href="?type=<?= $term->term_id ?>" class="main-pet-icons__link">
          <img src="<?= $term_thumbnail['url']; ?>" alt="" class="main-pet-icons__icon__img">
          <p class="main-pet-icons__icon__type"><?= $term->name ?></p>
        </a>
      </div>
    <?php endforeach;?>

  </section>
  <!--/Pet Icons-->

<!--Public_Private-->
<!--LIEN QUI NE SERVENT PLUS
<section class="public-private">
  <div class="public-private__public">
    <a href="#" class="public-private__public__title">Chez les autres</a>
  </div>
  
  <div class="public-private__private">
    <a href="<?php echo site_url('/tous-mes-animaux/')?>" class="public-private__private__title">Chez moi</a>
  </div>
</section>-->
<!--/Public_Private-->

<!--Timelines-->
<section class="main-timelines">

  <?php 

// Si le '?type= rien' avec $_GET['type'] alors on montre tous les posts du CPT animal | on pourrait l'appeler 'toto' tant que le href du dessus a le même nom ça marche
// Sinon on récupère l'id du animal-type et on restreint l'affichage selon l'id du type selectionné 
if (empty($_GET['type'])) {
  $args = [
    'post_type' => 'animal',
    'posts_per_page' => 6,
    'orderby' => 'rand',
  ];
}

else {
  $args = [
    'post_type' => 'animal',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'rand',
    'tax_query' => 
    [
      [
        'taxonomy' => $tax,
        'terms' => $_GET['type'],
      ]
    ]
  ];
}

$petType_wpQuery = new WP_Query($args);
?>

<?php if($petType_wpQuery->have_posts()) : while($petType_wpQuery->have_posts()) : $petType_wpQuery->the_post(); ?>
  <?php get_template_part('template-parts/homepage/timeline-posts') ?>
<?php endwhile; endif; wp_reset_query(); ?>
</section>

<!--/Timelines-->
</div>
<?php get_footer(); ?>
<?php else : ?>
  <?php  
    global $wp_query;
    $wp_query->set_404();
    status_header( 404 );
    get_template_part( 404 ); exit();
  ?>
<?php endif; ?> 
