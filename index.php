<?php get_header(); ?>


<!-- Banner post type -->
<div id="banner-topo" class="p-5 text-center bg-light text-white bg-banner-top d-flex justify-content-center align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12" id="text-banner-top">
          <h3 id="hat-banner-top">Food app</h3>
          <h1 class="mb-3">Why stay hungry when you can order form Bella Onojie</h1>
          <h3 id="second-title-banner-top">Download the bella onoje's food app now on</h3>
          <div class="btn-banner-top d-flex flex-md-row flex-column justify-content-center align-items-center mt-5 pt-3">
            <a href="#" class="general-btn-rounded btn-red btn-size-top">Playstore</a>
            <a href="#" class="general-btn-rounded btn-wit-top btn-size-top">App store</a>
          </div>
        </div>
      </div>
    </div>
  </div>



<section id="food-for-everyone" class="w-100">
  <div class="container">
    <div class="row">
      <div class="col-md-12 m-0 text-center">
        <img src="<?php bloginfo('template_url');?>/assets/images/img-food-for-everyone-both.png" class="img-fluid"> 
      </div>
    </div>
  </div>
</section>


<section id="secao-2-home" class="w-100 mt-5 pt-5 pb-1">
  <div class="container">
    <div class="row mt-2 mb-1">
      <div class="col-sm-6 col-md-12 text-center gridInverseMobile1">
        <hr class="hr-home mb-1">
      </div>
      <div class="col-sm-6 col-md-12 gridInverseMobile2">
        <h2 id="title-section-how-the-app-works" class="mt-5 pt-4 text-center text-black">How the app works</h2>
      </div>
    </div>
  </div>
</section>


<!-- inserção de loops -->

<div class="row">
    <?php 
        $acao_query1 = new WP_Query( array('category_name'=>'how-the-app-works', 'posts_per_page'=>3, 'order'=>'DESC'));

        while ( $acao_query1->have_posts() ) : $acao_query1->the_post();
    ?>

            <section class="w-100 mt-1">
                <div class="container">
                    <div class="row mt-2 mb-5 p-5">
                        <div class="col-md-5 m-0 text-left gridInverseMobile1">
                            <?php the_post_thumbnail('full', array( 'class' => 'img-fuid shadow-img'));?>
                        </div>
                        <div class="col-md-7 d-flex flex-column justify-content-center gridInverseMobile2">
                        
                            <?php /* Incluindo o campo Chapéu */
                                $campo_chapeu = get_post_meta($post->ID, '_chapeu', true);              
                                echo '<h3 class="hat-how-to-work text-orange mb-4">'.$campo_chapeu.' </h3>'; 
                            ?>
                            
                            <h2 class="title-how-to-work mb-4">
                                <?php the_title(); ?>
                            </h2>

                            <h4 class="secondary-title-how-to-work text-gray">
                                <?php the_excerpt(); ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </section>

    <?php endwhile; wp_reset_query(); ?> 

</div>

<!-- Banner post type -->

<!-- versão normal -->
<div id="version-normal-footer" class="p-2 text-center text-white bg-banner-footer d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="text-banner-footer">
        <h2 class="title-banner-footer text-white mb-3">Download the app now.</h2>
        <h4 class="second-title-banner-footer">Available on your favorite store. Start your premium experience now</h4>
        <div class="btn-banner-footer mt-5 pt-3">
          <a href="#" class="general-btn-squad-rounded btn-red btn-size-footer">Playstore</a>
          <a href="#" class="general-btn-squad-rounded btn-wit btn-size-footer">App store</a>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- versão mobile -->
<div id="version-mobile-footer" class="p-2 text-center bg-light text-white bg-banner-footer-mobile d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="text-banner-footer">
        <h2 class="title-banner-footer text-white mb-3">Download the app now.</h2>
        <h4 class="second-title-banner-footer">Most calendars are designed for teams.</h4>
        <div class="btn-banner-footer mt-2 pt-3 d-flex justify-content-between align-items-center">
          <a href="#" class="general-btn-squad-rounded btn-red btn-size-footer">Buy now</a>
          <a href="#" class="general-btn-squad-rounded btn-wit btn-size-footer">Try for free</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>