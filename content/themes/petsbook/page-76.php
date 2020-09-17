<!--ACCOUNT TIMELINE EDIT-->
<?php if(is_user_logged_in()) : ?>
<?php get_header(); ?>


    <div class="main-items-l arrow-top-edit-timeline">
      <div class="timeline-edit-wrapper">
        <div class="timeline-edit__header">
          <p class="timeline-edit__header__text">Ajoutez des photos à votre timeline !</p>
          <form method="POST" action="#" enctype="multipart/form-data">
          <input type="hidden" name="submit_photos_timeline" value=""/>
            <input id="file" name="image-timeline[]" class="input-file" type="file" multiple>
            <input type="submit" class="timeline-edit__header__button" value="Ajouter à la timeline">
          </form>
          
        </div>
        <!--Items-->
        <div class="timeline-edit__items">
            <?php
              $row = 1; //pour ACF le premier row est 1
              if( have_rows('une_section', $_GET['pet']) ): //https://www.advancedcustomfields.com/resources/have_rows/
                while ( have_rows('une_section', $_GET['pet']) ) : the_row();
                  $url_img = get_sub_field('photo');
                  $date = get_sub_field('date');
                  $texte = get_sub_field('texte'); 
                  ?>
                  <div class="timeline-edit__item">
                    <img src="<?= $url_img; ?>" alt="" class="timeline-edit__item__img">
                    <form action="" method='post' enctype="multipart/form-data">
                      <input type="hidden" name="submit_timeline_edit" value="<?php if(isset($_GET['pet'])) { echo $_GET['pet'];} ?>"/>
                      <input type="hidden" name="count_row" value="<?= $row;?>"/>
                      <div>
                          <input type="date" placeholder="Date" class="timeline-edit__item__links__link" name="timeline_edit_date" value=<?="$date"; ?>></input>
                      </div>  
                      <div>
                        <textarea name="timeline-edit__item__text" cols="30" rows="10" class="timeline-edit__item__textarea" placeholder="Description ..."><?= $texte; ?></textarea>
                      </div>
                      <div style="display:flex; justify-content:space-between; width:90%; margin:0 auto; ">
                        <input type="submit" name="delete-attachment" value="Supprimer" class="timeline-edit__item__links__buttons"/>
                        <input type="submit" name="save-timeline-edit" value="Enregistrer" class="timeline-edit__item__links__buttons"/>
                      </div>
                    </form>
                  </div>
                  <?php $row++; ?>
                  <?php endwhile; 
                endif; ?>
 
        </div>
        <!--/Items-->
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