<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="João Lindoso">
  <meta name="description" content="Projeto Bella Olonje WP">
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/assets/images/icon-bella-olonje.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,700,800,900" >
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,700,800,900" >
  <link rel="stylesheet" href="style.css" type="text/css">

  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css">

  <title>
    <?php if(is_front_page() || is_home()){
        echo get_bloginfo('name');
    } else {
        echo get_the_title();
    }?>
</title>

<?php wp_head(); ?>

</head>

<body>

<!-- Div necessária para carregar VLibras: vw -->
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>

  <nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
      <a class="navbar-brand" href="<?php bloginfo('wpurl');?>">
            <img src="<?php header_image(); ?>"  alt="<?php bloginfo('name'); ?>" class="img-fluid"/>
        </a>
        
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item ml-5">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item ml-5">
            <a class="nav-link" href="#">Product</a>
          </li>
          <li class="nav-item ml-5">
            <a class="nav-link" href="#">Faq</a>
          </li>
          <li class="nav-item ml-5">
            <a class="nav-link" href="#">Contacts</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>