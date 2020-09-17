<!--PET BOOK GLIMPSE-->
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

  <!--Pet profile-->
  <div class="animals__profiles">
  <?php get_template_part('template-parts/account_affichage_mes_animaux'); ?>

  </div>
  <!--/Pet profile-->
          
</section> 
<!-- /Section pet profile-->  

<div class="info-animal-wrapper"> 
        <section class="form__pet__infos">
          <h1 class="form__pet__infos__title">Carnet de Santé</h1>
         
          <div class="form__pet__infos__edit">
            <div class="info-glimpse__general-infos">
              <div class="form__pet__infos__animal">
                  <h4 class="form__pet__infos__animal__title">Prénom</h4>
                  <p class="form__pet__infos__animal__user"><?= get_the_title($_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Race</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('race', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Age</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('age', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Sexe</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('sexe', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Poids(kg)</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('poids', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Identification (puce/tatouage)</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('identification', $_GET['pet']); ?></p>
              </div>


              <div class="form__pet__infos__animal">
                  <h4 class="form__pet__infos__animal__title">Stérilisé/Castré</h4>
                  <p class="form__pet__infos__animal__user"><?= get_field('castre', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Couleur de la robe</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('couleur_de_la_robe', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Signes particulières</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('signes_particuliers', $_GET['pet']); ?></p>
              </div>
            </div>
            <!--------------------------------------------------------->
            <div class="info-glimpse__medical">
              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Antécédents médicaux</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('antecedents_medicaux', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Prise de médicaments</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('prise_de_medicaments', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Dernier traitement anti-parasitaire</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('dernier_traitement_anti-parasitaire', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                  <h4 class="form__pet__infos__animal__title">Dernier vaccin</h4>
                  <p class="form__pet__infos__animal__user"><?= get_field('dernier_vaccin', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Coordonnées du vétérinaire</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('coordonnees_du_veterinaire', $_GET['pet']); ?></p>
              </div>

              <div class="form__pet__infos__animal">
                      <h4 class="form__pet__infos__animal__title">Prochain rendez-vous vétérinaire</h4>
                      <p class="form__pet__infos__animal__user"><?= get_field('prochain_rendez_vous_veterinaire', $_GET['pet']); ?></p>
              </div>
            </div>
          </div>
        <div class="validate" style="justify-content:center;">    
        
        <a href="<?= get_permalink(69);?>?pet=<?= $_GET['pet']; ?>" class="validate__button">Infos générales</a>
        </div>
                
        </section>

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