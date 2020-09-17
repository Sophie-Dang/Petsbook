<?php get_header(); ?>
<div class="main-items">
      <div class="main-items-contact">
        <img class="main-items-contact__timbre" src="<?= get_theme_file_uri('public/images/timbre.png') ?>">
        <form class="form-contact" action="/my-handling-form-page" method="post" id="register">
          <div class="form-contact-fields">
            <div class="form-contact-fields__field">
              <label class="form-contact-fields__label" for="mail">Email</label>
              <input class="form-contact-fields__input" type="email" id="mail" />
            </div>
            <div class="form-contact-fields__field">
                <label class="form-contact-fields__label" for="last-name">Nom</label>
                <input class="form-contact-fields__input" type="text" id="last-name" />
            </div>
            <div class="form-contact-fields__field">
              <label class="form-contact-fields__label" for="name">Prénom</label>
              <input class="form-contact-fields__input" type="text" id="name" />
            </div>
            <div class="form-contact-fields__field">
                <label class="form-contact-fields__label" for="msg">Votre message</label>
                <textarea class="form-contact-fields__input" id="msg"></textarea>
            </div>
          </div>
          <div>
            <button class="form-contact__button" type="submit" form="register" value="Submit">Envoyer !</button>
          </div>
        </form>
      
        <address class="contact">
          <div class="contact__bloc">
            <p class="contact__info">PETS-BOOK</p>
            <a class="contact__info" href="mailto:petsbook@petsbook.fr">petsbook@petsbook.fr</a>
            <a class="contact__info" href="https://www.google.com/maps/place/50+Rue+Poissonni%C3%A8re,+75010+Paris/@48.8706546,2.345884,17z/data=!3m1!4b1!4m5!3m4!1s0x47e66e166435a7bd:0x6b4b3d0d1482a58c!8m2!3d48.8706546!4d2.3480727">50 Rue Poissonnière, 75010 Paris</a>
            <a class="contact__info" href="tel:+330303030201">03.03.03.02.01</a>
          </div>
        </address>
      </div>
    </div>
<?php get_footer(); ?>
