<!--ACCOUNT GENERAL-->
<?php if(is_user_logged_in()) : ?>

<?php get_header(); ?>
<main class="main">

<!-- Section pet profile-->
<section class="photos_profiles">

    <div class="human__profiles_elements">  
    <div class='human__profiles'>
        <a href="#"><img class='human__profiles__image'
        src="<?= get_field('photo_de_profil', 'user_' . $current_user->ID); ?>" alt=""></a> 
    </div>
        <h4 class='human__profiles__name'><?php $current_user = wp_get_current_user(); echo $current_user->first_name . " " . $current_user->last_name; ?></h4>  
        <a href="<?php echo site_url('/modifier-mon-compte/')?>" class="top-info__user__edit-profile">Modifier mon profil</a>          
    </div>

    
        <div class="animals__profiles">

        <?php get_template_part('template-parts/account_affichage_mes_animaux'); ?>

        
        <div class="animals__profiles__all__wrapper">  
            <a href="<?= get_permalink(70)?>"><!--
            <img class='animals__profiles__all__wrapper__image'
            src="https://source.unsplash.com/700x700/?pets" alt=""/>--> 
            <i class="fa fa-plus " aria-hidden="true"></i>
            </a>
        </div>

    </div>
        
</section> 
<!-- /Section pet profile-->  
<?php if (isset($_GET['pet'])){ ?>
   <div class="main-items">
     <div class="account-general-animal-wrapper">
          <section class="bottom-infos account-general-block" style="background-image: url('<?= get_the_post_thumbnail_url($_GET['pet']); ?>'); background-size:cover; background-position:center center;">

          </section>

              <div class="animal-infos account-general-block">
                  <label for="animal-infos__title" class="animal-infos__title">
                    <h3>Informations</h3></label>
                        <ul class="animal-infos__list">
                            <li><?= get_the_title($_GET['pet']); ?></li>
                            
                            <!--https://wordpress.stackexchange.com/questions/8284/get-the-term-list-without-links-in-3-1-->
                            <?php
                            $terms = get_the_term_list( $_GET['pet'], 'animal-type' );
                             $terms = strip_tags( $terms );
                             echo $terms;?></li>
                             <li><?php $post_object = get_post( $_GET['pet'] );
                            echo $post_object->post_content; ?></li>
                            <li><?= get_field('age', $_GET['pet']); ?> ans</li>
                            <li>Aime : <?= get_field('aime', $_GET['pet']); ?></li>
                            <li>N'aime pas : <?= get_field('naime_pas', $_GET['pet']); ?></li>
                            
                        </ul>

                    <div class="account-general__buttons">
                    <div class="btn-edit">
                        <a href="<?= get_permalink(70);?>?pet=<?= $_GET['pet'];?>" class="edit">Editer</a>
                    </div> 
                   
                    </div> 

                </div>
        

          <section class="health-book account-general-block">
              <label for="health-book__title" class="health-book__title">
                <h3>Carnet de santé</h3></label>
                    <ul>
                        <li>Dernière vaccination</li>
                        <li><?= get_field('dernier_vaccin', $_GET['pet']); ?></li>
                        <li>Coordonnees vétérinaire</li>
                        <li><?= get_field('coordonnees_du_veterinaire', $_GET['pet']); ?></li>
                        <li>Antécedants medicaux</li>
                        <li><?= get_field('antecedents_medicaux', $_GET['pet']); ?></li>
                        
                    </ul>

                    <div class="account-general__buttons">
                      <div class="btn-edit">
                          <a href="<?= get_permalink(67)?>?pet=<?= $_GET['pet'];?>" class="edit">Editer</a>
                      </div> 
                      <div class="btn-see">
                        <a href="<?= get_permalink(72)?>?pet=<?= $_GET['pet'];?>" class="see">Voir</a>
                      </div> 
                    </div>
                    
            </section>

            <section class="timeline-management account-general-block">
                <div style="background-image: url('<?= get_theme_file_uri('public/images/Illu-1-2.png'); ?>'); background-size:cover; background-position:center center; width: 200px; height: 200px;" class="timeline-management__pic"></div>

              <div class="account-general__buttons">
                <div class="btn-edit">
                    <a href="<?php the_permalink(76);?>?pet=<?= $_GET['pet']; ?>" class="edit-timeline">Editer la timeline</a>
                </div> 
                <div class="btn-see">
                  <a href="<?= get_permalink($_GET['pet']); ?>" class="see-timeline">Voir la timeline</a>
                </div>
              </div> 

            </section>
          </div>
   </div>
<?php } ?>
   
  </main>
<?php get_footer(); ?>
<?php else : ?>
  <?php  
    global $wp_query;
    $wp_query->set_404();
    status_header( 404 );
    get_template_part( 404 ); exit();
  ?>
<?php endif; ?> 
