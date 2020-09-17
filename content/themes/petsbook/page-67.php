<!--ACCOUNT BOOK EDIT-->
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
  <div class="info-animal-wrapper">
  <section class="form__infos__animal">
    <h1 class="form__infos__animal__title" >Carnet de santé</h1>
    
    <form action="#" method='post' class="form__infos__animal__edit spec-bookedit" enctype="multipart/form-data">

        <input type="hidden" name="submit_book_animal" value="<?php if(isset($_GET['pet'])) { echo $_GET['pet'];} ?>"/>

      <div class="book-edit__general-infos spec-bookedit__wrap">

        <div class="infos__animal__edit__paragraph" > 
            <label for="book__edit__name"class="infos__animal__edit__paragraph__label">Prénom</label> 
            <input class="infos__animal__edit__paragraph__input" type='text' name="book__edit__name" <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_the_title($_GET['pet']); ?>" <?php } ?>id="book__edit__name" rows="2"  cols="50"></input> 
        </div>
        <div class="infos__animal__edit__paragraph" >
            <label for="book__edit__race" class="infos__animal__edit__paragraph__label">Race</label> 
            <input class="infos__animal__edit__paragraph__input"type='text' name="book__edit__race" <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_field('race',$_GET['pet']); ?>" <?php } ?> id="book__edit__race" rows="2"  cols="50"></input> 
        </div>
        <div class="infos__animal__edit__paragraph" >
            <label for="book__edit__age" class="infos__animal__edit__paragraph__label">Age</label> 
            <input class="infos__animal__edit__paragraph__input" type="number"name="book__edit__age" <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_field('age',$_GET['pet']); ?>" <?php } ?> id="book__edit__age"></input> 
        </div>
        
        <div class="infos__animal__edit__paragraph" >
          <label for="book__edit__sexe" class="infos__animal__edit__paragraph__label">Sexe</label> 
          <div class="radios">

            <div class="radio">
              <input type="radio" class="infos__animal__edit__paragraph__radio" name="book_edit_sexe" 
              <?php if(isset($_GET['pet'])){ 
                if(get_field('sexe',$_GET['pet']) == 'femelle'){ echo 'checked="checked'; } }?>
              id="book_edit_castre" value="femelle" checked>
              <label for="femelle">Femelle</label>
            </div>

            <div class="radio">
              <input type="radio" class="infos__animal__edit__paragraph__radio" name="book_edit_sexe" 
              <?php if(isset($_GET['pet'])){ 
                if(get_field('sexe',$_GET['pet']) == 'male'){ echo 'checked="checked'; } }?>id="book_edit_castre" value="male">
              <label for="male">Mâle</label>
            </div>
          </div>
        </div>
        <div class="infos__animal__edit__paragraph" >
                <label for="book__edit__poids"class="infos__animal__edit__paragraph__label" >Poids(kg)</label> 
                <input class="infos__animal__edit__paragraph__input" type="number"name="book__edit__poids" <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_field('poids',$_GET['pet']); ?>" <?php } ?> id="book_edit_poids"></input> 
            </div>
        <div class="infos__animal__edit__paragraph" >
            <label for="book_edit_identification"class="infos__animal__edit__paragraph__label" >Identification</label> 
            <input type="text" name="book_edit_identification" <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_field('identification',$_GET['pet']); ?>" <?php } ?>id="book_edit_identification"></input> 
        </div>
        <div class="infos__animal__edit__paragraph">
            <label for="book_edit_castre" class="infos__animal__edit__paragraph__label">Stérilisé/Castré</label> 
            <div class="radios">

              <div class="radio">
                <input type="radio" class="infos__animal__edit__paragraph__radio" name="book_edit_castre" 
                <?php if(isset($_GET['pet'])){ 
                if(get_field('castre',$_GET['pet']) == 'oui'){ echo 'checked="checked'; } }?> id="book_edit_castre" value="oui" checked>
                <label for="femelle">Oui</label>
              </div>

              <div class="radio">
                <input type="radio" class="infos__animal__edit__paragraph__radio" name="book_edit_castre" 
                <?php if(isset($_GET['pet'])){ 
                if(get_field('castre',$_GET['pet']) == 'non'){ echo 'checked="checked'; } }?> id="book_edit_castre" value="non">
                <label for="male">Non</label>
              </div>
            </div>
        </div>
        <div class="infos__animal__edit__paragraph" >
            <label for="book_edit_color"class="infos__animal__edit__paragraph__label">Couleur de la robe</label> 
            <input class="infos__animal__edit__paragraph__input" type="text "name="book_edit_color" <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_field('couleur_de_la_robe',$_GET['pet']); ?>" <?php } ?>id="book_edit_color"></input> 
        </div>
        <div class="infos__animal__edit__paragraph" >
            <label for="book_edit_signes" class="infos__animal__edit__paragraph__label" >Signes particulier</label> 
                <textarea class="infos__animal__edit__paragraph__textarea" name="book_edit_signes"  id="book_edit_signes"><?php if(isset($_GET['pet'])){
                    echo get_field('signes_particuliers', $_GET['pet']);
                }?></textarea> 
        </div>
      </div>
      <!------------------------------------------------>
      <div class="book-edit__medical">
        <div class="infos__animal__edit__paragraph" >
                <label for="book_edit_antecedents"class="infos__animal__edit__paragraph__label" >Antécédents médicaux</label> 
                <input class="infos__animal__edit__paragraph__input" type="text" name="book_edit_antecedents" <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_field('antecedents_medicaux',$_GET['pet']); ?>" <?php } ?> id="book_edit_antecedents"></input> 
            </div>
        <div class="infos__animal__edit__paragraph" >
            <label for="book_edit_medocs" class="infos__animal__edit__paragraph__label">Prise de médicaments</label> 
            <textarea class="infos__animal__edit__paragraph__textarea" name="book_edit_medocs"  id="book_edit_medocs" rows="2"  cols="50"><?php if(isset($_GET['pet'])){
                    echo get_field('prise_de_medicaments', $_GET['pet']);
                }?></textarea> 
        </div>
        <div class="infos__animal__edit__paragraph" >
            <label for="book_edit_last_traitement"class="infos__animal__edit__paragraph__label" >Dernier traitement anti-parasitaire</label> 
            <input class="infos__animal__edit__paragraph__textarea" name="book_edit_last_traitement" <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_field('dernier_traitement_anti-parasitaire',$_GET['pet']); ?>" <?php } ?>id="book_edit_last_traitement" type="date" ></input> 
        </div>
        <div class="infos__animal__edit__paragraph" >
                <label for="book_edit_last_vaccin"class="infos__animal__edit__paragraph__label" >Dernier vaccin</label> 
                <input class="infos__animal__edit__paragraph__input" type="date" name="book_edit_last_vaccin" <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_field('dernier_vaccin',$_GET['pet']); ?>" <?php } ?> id="book_edit_last_vaccin" value=''></input> 
            </div>
        <div class="infos__animal__edit__paragraph" >
            <label for="book_edit_info_veto"class="infos__animal__edit__paragraph__label" >Coordonnées du vétérinaire</label> 
            <textarea class="infos__animal__edit__paragraph__textarea" name="book_edit_info_veto"  id="book_edit_info_veto"><?php if(isset($_GET['pet'])){
                    echo get_field('coordonnees_du_veterinaire', $_GET['pet']);
                }?></textarea> 
        </div>
        <div class="infos__animal__edit__paragraph" >
            <label for="book_edit_rdv"class="infos__animal__edit__paragraph__label" >Prochain rendez-vous vétérinaire</label> 
            <input type="date" class="infos__animal__edit__paragraph__textarea" name="book_edit_rdv" <?php if(!isset($_GET['pet'])){ ?>value="" <?php } else { ?> value="<?= get_field('prochain_rendez_vous_veterinaire',$_GET['pet']); ?>" <?php } ?> id="book_edit_rdv"></input> 
        
        </div>           
      </div>

      <div class="validate">
      
        <input type="submit" class="validate__button" value="Enregistrer">
        <a href="<?= get_permalink(69);?>?pet=<?= $_GET['pet']; ?>" class="validate__button">Infos générales</a>
        <!--<a href="<?= get_permalink(72);?>?pet=<?= $_GET['pet']; ?>"class="validate__button">Voir carnet de santé</a>-->
        
      </div>
    </form>

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
