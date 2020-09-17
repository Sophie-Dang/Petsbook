<!--CONNEXION-->
<?php if(is_user_logged_in()==false) : ?>
<?php get_header(); ?>

<div class="main-items">
      <div class="connection">
        <img class="connection__logo" src="<?= get_theme_file_uri('public/images/logo-fond-transparent.png') ?>" alt="">
        <form class="form-connection" action="#" method="post" enctype="multipart/form-data" id="connexion">
        <input type="hidden" name="submit_connexion" value=""/>
          <div class="form-connection-fields">
            <div class="form-connection-fields__field">
                <label class="form-connection-fields__label" for="mail">Email*</label>
                <input class="form-connection-fields__input" type="text" id="mail" name="user_mail">
            </div>
            <div class="form-connection-fields__field">
                <label class="form-connection-fields__label" for="user_password">Mot de passe*</label>
                <input class="form-connection-fields__input" type="password" id="password" name="user_pass">
            </div>
          </div>
          <!-- "Mot de passe oublié" - nous n'avons pas pour l'instant d'option d'envoi
          <div class="form-connection__link">
            <a class="form-connection__a" href="#">Mot de passe oublié</a>
          </div>
          -->

          <div>
            <input class="form-connection__button" type="submit"  value="Me connecter"/>
          </div>
        </form>
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