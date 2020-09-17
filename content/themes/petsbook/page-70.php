<!--ACCOUNT INFOS EDIT-->
<?php if(is_user_logged_in()) : ?>
<?php get_header(); ?>
<!-- Section pet profile-->
<section class="photos_profiles">

  <div class="human__profiles_elements">

          <div class='human__profiles'>
              <a href="#"><img class='human__profiles__image'
              src="<?= get_field('photo_de_profil', 'user_' . $current_user->ID); ?>" alt=""></a> 
          </div>
          <h4 class='human__profiles__name'><?php $current_user = wp_get_current_user(); echo $current_user->first_name . " " . $current_user->last_name; ?></h4>
  </div>

  <div class="animals__profiles">
    <?php get_template_part('template-parts/account_affichage_mes_animaux'); ?>

  </div>
</section>   
<!-- /Section pet profile-->

<div class="main-items-l">
<div class="info-animal-wrapper ">
<section class="form__infos__animal">
  <h1 class="user_infos-wrapper" >Informations sur l'animal</h1>
  

  <form action="" method='post' class="form__infos__animal__edit infos-pet-edit" enctype="multipart/form-data">
  
    <input type="hidden" name="submit_ajout_animal" value=""/>

    <input type="hidden" name="id_edition_animal" value="<?php if(isset($_GET['pet'])) { echo $_GET['pet'];} ?>"/>
    
    <div class="infos__animal__edit__paragraph" > 
        <label for="file"class="infos__animal__edit__paragraph__label">Photo de l'animal</label> 
        <input id="file" name="ajout-image-animal" class="input-file" type="file"> 
    </div>

    <div class="infos__animal__edit__paragraph" > 
        <label for="book__edit__name"class="infos__animal__edit__paragraph__label">Prénom</label> 
        <input class="infos__animal__edit__paragraph__input" type='text' name="book__edit__name" 
        <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_the_title($_GET['pet']); ?>" <?php } ?>
        id="book__edit__name" rows="2"  cols="50"></input> 
    </div>

    <div class="infos__animal__edit__paragraph" >
      <label for="info_edit_type" class="infos__animal__edit__paragraph__label">Type</label> 
      <!--select choices-->
      <select class="infos__animal__edit__paragraph__select" name="pet-select" id="pet-select">
        
        <?php
        $terms = '';
        if(isset($_GET['pet'])){
          $terms = get_the_term_list( $_GET['pet'], 'animal-type' );
          $terms = strip_tags( $terms );
          
        }
        
        ?>
        
        <option value=""><?php echo $terms; ?></option>
        <option value="">---</option>
        <option value="chien" <?php if ($terms == 'chien'){ echo 'selected="selected"'; } ?> >Chien</option>
        <option value="chat"<?php if ($terms == 'chat'){ echo 'selected="selected"'; } ?>>Chat</option>
        <option value="oiseau" <?php if ($terms == 'oiseau'){ echo 'selected="selected"'; } ?>>Oiseau</option>
        <option value="rongeur" <?php if ($terms == 'rongeur'){ echo 'selected="selected"'; } ?>>Rongeur</option>
        <option value="nac" <?php if ($terms == 'nac'){ echo 'selected="selected"'; } ?>>NAC</option>
      </select>
      <!--/select choices-->
    </div>
    


    <div class="infos__animal__edit__paragraph" >
        <label for="info_edit_age" class="infos__animal__edit__paragraph__label">Age</label> 
        <input class="infos__animal__edit__paragraph__input" type="number" name="info_edit_age" 
        <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_field('age',$_GET['pet']); ?>" <?php } ?>
        id="info_edit_age"></input> 
    </div>
    
    <div class="infos__animal__edit__paragraph" >
      <label for="info_edit_like" class="infos__animal__edit__paragraph__label">Aime</label> 
      <textarea class="infos__animal__edit__paragraph__textarea" name="info_edit_like" id="info_edit_like"><?php if(isset($_GET['pet'])){ echo get_field('aime',$_GET['pet']); }?> 
      </textarea> 
    </div>

    <div class="infos__animal__edit__paragraph" >
      <label for="info_edit_dislike" class="infos__animal__edit__paragraph__label" >N'aime pas</label> 
      <textarea class="infos__animal__edit__paragraph__textarea" name="info_edit_dislike" id="info_edit_dislike"><?php if(isset($_GET['pet'])){ echo get_field('naime_pas',$_GET['pet']); }?></textarea> 
    </div>

    <div class="infos__animal__edit__paragraph" >
      <label for="info_edit_description" class="infos__animal__edit__paragraph__label" >Description</label> 
      <textarea class="infos__animal__edit__paragraph__textarea" name="info_edit_description" id="info_edit_description"><?php if(isset($_GET['pet'])){ $post_object = get_post( $_GET['pet'] ); echo $post_object->post_content; }?></textarea> 
    </div>
    

  <div class="validate three_btns">
   

      <a href="<?= get_permalink(69);?>?pet=<?= $_GET['pet']; ?>"class="validate__button three_btn">Infos générales</a>

      <input type="submit" value="Enregistrer" class="validate__button three_btn"/>
   
      <a href="<?= get_permalink(72);?>?pet=<?= $_GET['pet']; ?>" class="validate__button three_btn">Carnet de santé</a>

    
  </div>
  </form>
</section>
</div>
</div>

<?php // var_dump(wp_set_object_terms(275, 'Toto', 'animal-type')); ?>

<?php get_footer(); ?>
<?php else : ?>
  <?php  
    global $wp_query;
    $wp_query->set_404();
    status_header( 404 );
    get_template_part( 404 ); exit();
  ?>
<?php endif; ?> 