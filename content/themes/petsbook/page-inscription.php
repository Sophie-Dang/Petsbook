<?php if(is_user_logged_in()==false) : ?>
<?php get_header(); ?>
<div class="top">
    <img src="<?= get_theme_file_uri('public/images/logo-fond-transparent.png') ?>" alt="" class="top__background">
</div>

<div class="main-items">
  <form action="#" method="post" enctype="multipart/form-data" class="user-informations">
    <input type="hidden" name="submit_inscription" value=""/>
    <div class="user-informations__email">
      <label for="" >Nom*</label> 
      <input type="text" name="user__lastname" class="user-informations__email__input">
    </div>
    <div class="user-informations__email">
      <label for=""> Prénom*</label> 
        <input type="text"  name="user__name" class="user-informations__email__input">
    </div>
    <div class="user-informations__email">
      <label for=""> Email*</label> 
        <input type="text" name="user__email"  class="user-informations__email__input">
    </div>

    <div class="user-informations__password">
      <label for="user-informations__password__input" >Mot de passe*</label>  
        <input type="password" name="user__password" class="user-informations__password__input">
    </div>
    
    <div class="user-informations__confirmPassword">
      <label for="user-informations__confirmPassword__input">Confirmation du mot de passe*</label>  
        <input type="password" name="user__confirm__password" class="user-informations__confirmPassword__input">
    </div>

    <div class="user-informations__cgu">
        <input type="checkbox" name="user__cgu" class="user-informations__cgu__input"> J'accepte les règles d'utilisation du site*
    </div>

    <div class="user-informations__newsletter">
        <input type="checkbox" name="user__newsletter" class="user-informations__newsletter__input"> Je m'abonne à la Newsletter 
    </div>
    
    <div class="user-informations__signup">
        <input type="submit" value="Je m'inscris" class="user-informations__signup__submit"/>
    </div> 
  </form>
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