<!--ACCOUNT USER INFOS EDIT-->
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
<div class="info-animal-wrapper user-infos-wrap">
<section class="form__infos__animal">
  <h1 class="form__infos__animal__title" >Vos informations</h1>
  
  <form action="#" method='post' class="form__infos__animal__edit infos-pet-edit" enctype="multipart/form-data">
  
  <input type="hidden" name="update_data_user" value=""/>

  <div class="infos__animal__edit__paragraph" > 
        <label for="file"class="infos__animal__edit__paragraph__label">Photo de profil</label> 
        <input id="file" name="update_data_user" class="input-file" type="file"> 
    </div>

    <div class="infos__animal__edit__paragraph" > 
        <label for="book__edit__name"class="infos__animal__edit__paragraph__label">Nom</label> 
        <input class="infos__animal__edit__paragraph__input" type='text' name="book__edit__lastname" value="<?= $current_user->last_name; ?>" id="book__edit__name" rows="2"  cols="50"></input> 
    </div>

    <div class="infos__animal__edit__paragraph" > 
      <label for="book__edit__name"class="infos__animal__edit__paragraph__label">Prénom</label> 
      <input class="infos__animal__edit__paragraph__input" type='text' name="book__edit__firstname" value="<?= $current_user->first_name; ?>" id="book__edit__name" rows="2"  cols="50"></input> 
  </div>

    <div class="infos__animal__edit__paragraph" >
      <label for="pet-select" class="infos__animal__edit__paragraph__label">Sexe</label> 
      <!--select choices-->
      <select class="infos__animal__edit__paragraph__select" name="sexe-select" id="pet-select">
        <option value="">---</option>
        <option value="homme" <?php if (get_field('sexe', 'user_' . $current_user->ID) == 'homme'){ echo 'selected="selected"'; } ?>>Homme</option>
        <option value="femme" <?php if (get_field('sexe', 'user_' . $current_user->ID) == 'femme'){ echo 'selected="selected"'; } ?>>Femme</option>
        <option value="autre" <?php if (get_field('sexe', 'user_' . $current_user->ID) == 'autre'){ echo 'selected="selected"'; } ?>>Autre</option>
        
      </select>
      <!--/select choices-->
    </div>

    <div class="infos__animal__edit__paragraph" >
        <label for="info_edit_age" class="infos__animal__edit__paragraph__label">Age</label> 
        <input class="infos__animal__edit__paragraph__input" type="number"name="info_edit_age" value='<?php echo get_field('age', 'user_' . $current_user->ID); ?>' id="info_edit_age"></input> 
    </div>
    
    <div class="infos__animal__edit__paragraph" >
      <label for="info_edit_like" class="infos__animal__edit__paragraph__label">E-mail</label> 
      <input class="infos__animal__edit__paragraph__input" type="email" name="info_user_email" value='<?php echo $current_user->user_email;?>' id="info_edit_like"></input> 
    </div>

    <div class="infos__animal__edit__paragraph" >
      <label for="info_edit_address" class="infos__animal__edit__paragraph__label" >Adresse</label> 
      <textarea class="infos__animal__edit__paragraph__textarea" name="info_edit_address"  id="info_edit_address"><?php echo get_field('adresse', 'user_' . $current_user->ID); ?></textarea> 
    </div>

    <div class="validate validate-account_user_info">     
      <!--<a href="#" class="validate__button">Enregistrer</a> -->
      <input type="submit" class="validate__button" value="Enregistrer">   
  </div>
  </form>

  
</section>
</div>
</div>
<?php get_footer();?>
<?php else : ?>
  <?php  
    global $wp_query;
    $wp_query->set_404();
    status_header( 404 );
    get_template_part( 404 ); exit();
  ?>
<?php endif; ?> 