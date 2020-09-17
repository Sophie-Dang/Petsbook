</main>
  <!--/MAIN-->
  
  <!--FOOTER-->
  <footer class="footer">
    <!--newsletter-->
    <div class="footer-wrapper">
      <form method="POST" class="footer-newsletter">
      <input type="hidden" name="submit_newsletter" value=""/>
        <div class="footer-newsletter-wrapper">
          <h5 class="footer-newsletter__title">S'inscrire à la newsletter</h5>
          <div class="footer-newsletter__fields">
            <input type="text" class="footer-newsletter__fields__field" name="footer_field" placeholder="Email">
          </div>
            <button class="footer-newsletter__submit" type="submit">Envoyer</button>
        </div>
      </form>
      <!--/newsletter-->
      <div class="footer-archives">
       <ul class="footer-archives__list">   
          <?php footer_nav()?>

        </ul>
      </div>

      
    </div>

    <div class="footer-copyrights">Copyright @<?= date('Y'); ?></div> 
   
  </footer>
  <!--/FOOTER-->
</div>
  <script src="js/app.js"></script>
  <?php wp_footer(); ?>
</body>
</html>
  