<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php wp_head(); ?>
   <title><?php bloginfo('name'); ?></title>
</head>
<body>
   <!-- HEADER Section -->
  <header id="home">
     <!-- Navigation -->
     <nav id="navigation" class="navbar navbar-expand-md py-3">
         <div class="container d-flex align-items-center justify-content-between">
            <a class="navbar-brand" href="#">
               <?php 
                  if ( function_exists( 'the_custom_logo' ) ) {
                     the_custom_logo();
                 }
               ?>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
               <i class="fas fa-bars text-white"></i>
           </button>
            <div class="navbar-collapse collapse justify-content-end" id="navbarCollapse">
               <?php 
                  wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
               ?>
            </div>
         </div>
     </nav>
     <!-- HERO Section -->
     <section id="hero" class="text-center text-white">
         <div class="container">
            <div class="row">
               <?php 
                  $query = new WP_Query(array(
                     'post_type' => 'hero',
                     'posts_per_page' => 1
                  ));

                  while($query -> have_posts()){
                     $query-> the_post(); ?>
                     <div class="col">
                        <h1 class="display-3 text-uppercase">
                           <?php echo get_field('hero_title'); ?>
                        </h1>
                        <p><?php echo get_field('hero_description'); ?></p>
                     </div>
                  <?php }
                  wp_reset_postdata();
               ?>
            </div>
            <a class="btn text-white btn-arrow" href="#work">
               <i class="fas fa-chevron-down fa-lg"></i>
            </a>
         </div>
     </section>
  </header>