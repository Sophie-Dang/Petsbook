<?php get_header(); ?>
<!-- Ici je créé 4 sections qui correspondent à une étape (une photo) . Ces sections seront répétées à l'infini (autant de fois qu'il y aura de photos) 
Pour cela j'utilise la fonction repeater de ACF. Chaque section est donc un repeater et chaque section comprend 3 subfield (photo, date, texte).

L'apparition des éléments se gère grâce aux différentes class par exemple scroll_fallen_objects : avec scrollex on addClass scroll_fallen_objects_animate quand la div entre dans l'écran ce qui la fait apparaitre et tomber puis on removeClass scroll_fallen_objects_animate quand la div sort de l'écran ce qui la fait disparaitre (voir js et css)-->
    
<div id="timeline-glimpse__container">  
       <div class="timeline-glimpse">
          <section class="timeline-glimpse__section__intro">
            <div class="timeline-glimpse__section__intro__text">
              <h1>Le monde de <?php the_title(); ?></h1>
            </div>
            <div class="timeline-glimpse__section__intro__element" id="element__lawn"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__mountains__4"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__mountains__5"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__mountains__2"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__mountains__3"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__tree__21"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__tree__22"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__tree__20"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__tree__23"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__tree__24"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__tree__25"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__tree__27"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__tree__26"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__bush__3"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__bush__4"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__fence__5"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__fence__6"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__fence__7"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__fence__8"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__fence__9"></div>
            <div class="timeline-glimpse__section__intro__element scroll_door_open" id="element__door__1"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__bush__6"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__bush__7"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__bush__8"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__bush__5"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__flower__86"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__flower__87"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__flower__88"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__flower__89"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__flower__90"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__flower__91"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__flower__92"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__flower__93"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__flower__94"></div>
            <div class="timeline-glimpse__section__intro__element" id="element__flower__95"></div>
          
          </section>

          <?php 
          //On va incrémenter $i de 0 à 4 en boucle afin d'alterner les sections
              $i=0;
              if( have_rows('une_section') ): //https://www.advancedcustomfields.com/resources/have_rows/
                while ( have_rows('une_section') ) : the_row();?>

                  <!--Section une -->   
                  <?php if ($i == 0) { ?>
                    <section class="timeline-glimpse__section timeline-glimpse__section__1">
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__2"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__1"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__3"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__4"></div>
                      <div class="timeline-glimpse__section__element scroll_right_side_objects" data-speed="10" id="element__hedgehog__1"></div>
                      <!--data-speed correspond au coefficient de vitesse de déplacement de l'élement par rapport à la valeur retournée par scrollex (voir progress dans le js)  -->
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__1"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__2"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__3"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__5"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__4"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__5"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__6"></div>
                      <div class="timeline-glimpse__section__element scroll_expand_objects" id="element__pond__1"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__7"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__8"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__9"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__10"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__fence__1"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__11"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__12"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__13"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__14"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__15"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__16"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__17"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__18"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__19"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__20"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__21"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__22"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__23"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__24"></div> 
                    </section>
                  <?php } 

                  if ($i == 1) { ?>
                  <!-- Début de ma deuxième section-->
                    <section class="timeline-glimpse__section timeline-glimpse__section__2">
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__25"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__26"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__27"></div>   
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__bush__1"></div>   
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__fence__2"></div> 
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__6"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__7"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__28"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__29"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__30"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__31"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__32"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__33"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__34"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__35"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__36"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__37"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__38"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__8"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects sequence_png" data-height="74" data-step="7" data-animation_speed="150" id="element__fox__1"></div> 
                      <!-- l'animation se fait grâce à des sprite sheets (une seule image avec toutes les étapes de l'animation l'une en dessous de l'autre: https://s3-us-west-2.amazonaws.com/s.cdpn.io/29123/preloader2.png) le principe est donc de faire défiler cette image en background-position-y dans une div qui a pour dimension la hauteur et largeur d'une étape.
                      data-height correspond à la hauteur d'une étape de l'animation (par exemple l'abeille a 2 étapes, une étape avec les ailes vers le haut et une étape avec les ailes vers le bas) 
                      data-step correspond au nombre d'étapes
                      data-animation-speed correspond à la vitesse d'animation (durée de chaque étape en ms)-->
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__39"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__40"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__41"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__42"></div>
                    </section>
                  <?php } 

                  if ($i == 2) { ?>
                    <!-- Début de ma troisième section-->
                    <section class="timeline-glimpse__section timeline-glimpse__section__3">
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__house__1"></div> 
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__fence__3"></div> 
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__9"></div> 
                      <div class="timeline-glimpse__section__element scroll_fallen_objects sequence_png" data-height="295" data-step="18" data-animation_speed="120" id="element__deer__1"></div> 
                      <div class="timeline-glimpse__section__element scroll_expand_objects" id="element__pond__2"></div> 
                      <div class="timeline-glimpse__section__element scroll_expand_objects" id="element__pond__3"></div> 
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__43"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__44"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__45"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__46"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__47"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__48"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__49"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__50"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__51"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__52"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__53"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__54"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__55"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__10"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__56"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__57"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__58"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__11"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__fence__4"></div> 
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__59"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__60"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__61"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__62"></div>
                      <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__63"></div>
                    </section>
                  <?php } 

                  if ($i == 3) { ?>
                    <!-- Début de ma quatrième section-->
                  <section class="timeline-glimpse__section timeline-glimpse__section__4">
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__mountains__1"></div> 
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__bush__2"></div> 
                    <div class="timeline-glimpse__section__element scroll_fallen_objects sequence_png" data-height="74" data-step="7" data-animation_speed="150" id="element__fox__2"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__13"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__12"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__14"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__16"></div>
                    <div class="timeline-glimpse__section__element scroll_right_side_objects" data-speed="15" id="element__hedgehog__2"></div> 
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__15"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__17"></div>
                    <div class="timeline-glimpse__section__element scroll_expand_objects" id="element__pond__4"></div> 
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__64"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__65"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__66"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__67"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__68"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__69"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__70"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__71"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__72"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__73"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__74"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__75"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__76"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__77"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__78"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__79"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__80"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__81"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__82"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__83"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__84"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__flower__85"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__18"></div>
                    <div class="timeline-glimpse__section__element scroll_fallen_objects" id="element__tree__19"></div>
                  </section>
                <?php } ?>

            <?php 
              $i++;
              if ($i == 4){
                $i=0;
              }
            endwhile;
          endif; ?>
          
        <div id="timeline__raccoon"></div>
      </div>

      <!--SEPARATION DES DEUX DIV <timeline-glimpse> -->

      <!-- Ici je copie colle la même div timeline-glimpse que sur le dessus. Je lui ajoute un id __overview pour le style. Je coupe tous les éléments qui doivent être par dessus le raccoon (photos, texte, date et nuages, abeilles, ..) de ma div du dessus pour les coller dans la div ci-dessous. Petit tour de passe passe..... -->

      <div class="timeline-glimpse" id="timeline-glimpse__overview">

        <section class="timeline-glimpse__section__intro">
        </section>

        <?php 
          $i=0;
          if( have_rows('une_section') ):
            while ( have_rows('une_section') ) : the_row();
              $url_img = get_sub_field('photo');
              $date = get_sub_field('date');
              $texte = get_sub_field('texte'); ?>

              <?php if ($i == 0) { ?>
                <!--Section une --> 
                <section class="timeline-glimpse__section timeline-glimpse__section__1">
                  <div class="timeline-glimpse__section__pic" style="background-image: url('<?= $url_img ?>'); background-size:cover; background-position:center center;">
                    <div class="timeline-glimpse__section__pic__calage">
                      <div class="timeline-glimpse__section__date">
                        <p><?= $date ?></p>
                      </div>
                      <div class="timeline-glimpse__section__text">
                        <p><?= $texte ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="timeline-glimpse__section__element scroll_right_side_objects sequence_png" data-height="41" data-step="2" data-animation_speed="100" data-speed="100" id="element__bee__1">
                  </div>   
                  <div class="timeline-glimpse__section__element scroll_link_side_objects sequence_png" data-height="41" data-step="2" data-animation_speed="100" data-speed="95" id="element__bee__2"></div>
                  <div class="timeline-glimpse__section__element scroll_link_side_objects" data-speed="120" id="element__cloud__1"></div>         
                </section>
              <?php } 

              if ($i == 1) { ?>
                <!-- Début de ma deuxième section-->
                <section class="timeline-glimpse__section timeline-glimpse__section__2">
                  <div class="timeline-glimpse__section__pic" style="background-image: url('<?= $url_img ?>'); background-size:cover; background-position:center center;">
                    <div class="timeline-glimpse__section__pic__calage">
                      <div class="timeline-glimpse__section__date">
                        <p><?= $date ?></p>
                      </div>
                      <div class="timeline-glimpse__section__text">
                        <p><?= $texte ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="timeline-glimpse__section__element scroll_link_side_objects sequence_png" data-height="41" data-step="2" data-animation_speed="100" data-speed="130" id="element__bee__3"></div>
                  <div class="timeline-glimpse__section__element scroll_right_side_objects" data-speed="150" id="element__airballoon__1"></div>
                  <div class="timeline-glimpse__section__element scroll_link_side_objects" data-speed="200" id="element__cloud__2"></div> 
                  <div class="timeline-glimpse__section__element scroll_right_side_objects" data-speed="200" id="element__cloud__3"></div> 
                </section>
              <?php } 

              if ($i == 2) { ?>
                <!-- Début de ma troisième section-->
                <section class="timeline-glimpse__section timeline-glimpse__section__3">
                  <div class="timeline-glimpse__section__pic" style="background-image: url('<?= $url_img ?>'); background-size:cover; background-position:center center;">
                    <div class="timeline-glimpse__section__pic__calage">
                      <div class="timeline-glimpse__section__date">
                        <p><?= $date ?></p>
                      </div>
                      <div class="timeline-glimpse__section__text">
                        <p><?= $texte ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="timeline-glimpse__section__element scroll_right_side_objects sequence_png" data-height="41" data-step="2" data-animation_speed="100" data-speed="60" id="element__bee__4"></div>
                  <div class="timeline-glimpse__section__element scroll_link_side_objects" data-speed="130" id="element__cloud__4"></div> 
                </section>
              <?php } 

              if ($i == 3) { ?>
                <!-- Début de ma quatrième section-->
                <section class="timeline-glimpse__section timeline-glimpse__section__4">
                  <div class="timeline-glimpse__section__pic" style="background-image: url('<?= $url_img ?>'); background-size:cover; background-position:center center;">
                    <div class="timeline-glimpse__section__pic__calage">
                      <div class="timeline-glimpse__section__date">
                        <p><?= $date ?></p>
                      </div>
                      <div class="timeline-glimpse__section__text">
                        <p><?= $texte ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="timeline-glimpse__section__element scroll_right_side_objects" data-speed="160" id="element__cloud__5"></div>
                  <div class="timeline-glimpse__section__element scroll_right_side_objects" data-speed="190" id="element__cloud__6"></div>
                </section>
              <?php }
              
              $i++;
              if ($i == 4){
                $i=0;
              }
            endwhile;
          endif; ?>
      </div>
      
    </div>
<?php get_footer(); ?>
