<footer>
  <div class="container">
    <div id="footer-items" class="d-flex flex-md-row flex-column justify-content-md-between justify-content-center align-items-center">
      <div class="logo-rodape">
        <a class="navbar-brand" href="<?php bloginfo('wpurl');?>">
          <?php dynamic_sidebar('sidebar-marcarodape'); ?>
        </a>
      </div>
      <div class="social-icons d-flex justify-content-between align-items-center">
        <a href="#"><img src="<?php bloginfo('template_url'); ?>/assets/images/img-twitter.png"></a>
        <a href="#"><img src="<?php bloginfo('template_url'); ?>/assets/images/img-facebook.png"></a>
        <a href="#"><img src="<?php bloginfo('template_url'); ?>/assets/images/img-instagram.png"></a>
      </div>
      <div class="text-copyright">
        Copywright <?php echo date(Y); ?> Bella Onojie.com
      </div>
    </div>
  </div>
</footer>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script> new window.VLibras.Widget('https://vlibras.gov.br/app'); </script>

<?php wp_footer(); ?>

</html>