<?php get_header(); ?>

<!-- Banner post type loop -->
<?php 
    $acao_query2 = new WP_Query( array('post_type'=>'banners', 'category_name'=>'banner-topo', 'posts_per_page'=>1, 'order'=>'DESC'));

    while ( $acao_query2->have_posts() ) : $acao_query2->the_post();
?>

        <div id="banner-topo" class="p-5 text-center bg-light text-white d-flex justify-content-center align-items-center" style="min-height: 619px; background-image: url('<?php echo get_the_post_thumbnail_url();?>')">
          <div class="container">
            <div class="row">
              <div class="col-md-12" id="text-banner-top">
                <h3 id="hat-banner-top">
                    <?php 
                        $tags = get_tags(); 
                        foreach ( $tags as $tag ) { 
                          echo $tag->name; 
                        } 
                    ?>
                </h3>
                <h1 class="mb-3">
                    <?php the_title(); ?>
                </h1>
                <h3 class="second-title-banner-top">
                   <?php the_excerpt(); ?>
                </h3>
                <div class="btn-banner-top d-flex flex-md-row flex-column justify-content-center align-items-center mt-5 pt-3">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        
<?php endwhile; wp_reset_query(); ?> 


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

<ul class="container posts-wtaw">
    <?php 
        $acao_query1 = new WP_Query( array('category_name'=>'how-the-app-works', 'posts_per_page'=>3, 'order'=>'DESC'));

        while ( $acao_query1->have_posts() ) : $acao_query1->the_post();
    ?>

            <li class="row mt-2 mb-5 p-5">
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
            </li>

    <?php endwhile; wp_reset_query(); ?> 

</ul>

<!-- Banner post type loop -->
<!-- versão normal -->

<?php 
    $acao_query2 = new WP_Query( array('post_type'=>'banners', 'category_name'=>'banner-rodape', 'posts_per_page'=>1, 'order'=>'DESC'));

    while ( $acao_query2->have_posts() ) : $acao_query2->the_post();
?>

        <div id="version-normal-footer" class="p-2 text-center text-white d-flex justify-content-center align-items-center" style="min-height: 619px; background-image: url('<?php echo get_the_post_thumbnail_url();?>')">
          <div class="container">
            <div class="row">
              <div class="col-md-12" id="text-banner-footer">
                <h2 class="title-banner-footer text-white mb-3">
                    <?php the_title(); ?>
                </h2>
                <h4 class="second-title-banner-footer">
                   <?php the_excerpt(); ?>
                </h4>
                <div class="btn-banner-footer mt-5 pt-3">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        
<?php endwhile; wp_reset_query(); ?> 




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