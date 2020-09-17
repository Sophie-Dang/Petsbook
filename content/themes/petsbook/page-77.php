<!--ACCOUNT USER INFOS-->
<?php if(is_user_logged_in()) : ?>
<?php get_header(); 

$current_user = wp_get_current_user(); ?>

<section class="photos_profiles">

<div class="human__profiles_elements">

      <div class='human__profiles'>
          <a href="#"><img class='human__profiles__image'
          src="<?= get_field('photo_de_profil', 'user_' . $current_user->ID); ?>" alt=""></a> 
      </div>
      <h4 class='human__profiles__name'><?php echo $current_user->first_name;?></h4>
</div>

</section>   
<!-- /Section pet profile-->

<div class="main-items-l">
<div class="info-animal-wrapper user_infos-wrapper">
<section class="form__infos__animal">
  <h1 class="form__infos__animal__title" >Vos Informations</h1>
  
  <div class="form__pet__infos__edit infos-pet-edit user_infos">
    <div class="form__pet__infos__animal">
        <h4 class="form__pet__infos__animal__title">Nom</h4>
        <p class="form__pet__infos__animal__user"><?php echo $current_user->last_name;?></p>
    </div>

    <div class="form__pet__infos__animal">
            <h4 class="form__pet__infos__animal__title">Prénom</h4>
            <p class="form__pet__infos__animal__user"><?php echo $current_user->first_name;?></p>
    </div>

    <div class="form__pet__infos__animal">
            <h4 class="form__pet__infos__animal__title">Sexe</h4>
            <p class="form__pet__infos__animal__user"><?php echo get_field('sexe', 'user_' . $current_user->ID); ?></p>
    </div>

    <div class="form__pet__infos__animal">
            <h4 class="form__pet__infos__animal__title">Age</h4>
            <p class="form__pet__infos__animal__user"><?php echo get_field('age', 'user_' . $current_user->ID); ?></p>
    </div>

    <div class="form__pet__infos__animal">
            <h4 class="form__pet__infos__animal__title">E-mail</h4>
            <p class="form__pet__infos__animal__user"><?php echo $current_user->user_email;?></p>
    </div>

    <div class="form__pet__infos__animal">
            <h4 class="form__pet__infos__animal__title">Adresse</h4>
            <p class="form__pet__infos__animal__user"><?php echo get_field('adresse', 'user_' . $current_user->ID); ?></p>
    </div>
</div>

  <div class="validate validate-account_user_info">     
      <a href="<?php echo site_url('/modifier-mon-compte/')?>" class="validate__button_2 button-account_user_info">Modifier</a>   
  </div>
</section>
</div>
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