   <?php get_header(); ?>
  <!-- ABOUT Section -->
  <section id="about" class="mt-5">
      <div class="container">
         <div class="row text-center">
            <?php 
               $query = new WP_Query(array(
                  'post_type' => 'about',
                  'posts_per_page' => 1
               ));

               while($query-> have_posts()) {
                  $query-> the_post(); ?>
                  <div class="col-8 mx-auto">
                  <?php 
                     $image = get_field('about_image');
                     if( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                  <?php endif; ?>
                     <h3 class="display-5 mb-5 about-title pb-2"><?php echo get_field('about_title'); ?></h3>
                     <p class="text-justify">
                        <?php echo get_field('about_content'); ?>
                     </p>
                  </div>
               <?php }
               wp_reset_postdata();
            ?>
         </div>
      </div>
  </section>
  <!-- EXPERIENCE Section -->
  <section id="experience" class="mt-5 py-5">
     <div class="container">
        <?php 
            $query = new WP_Query(array(
               'posts_per_page' => 1,
               'post_type' => 'experience'
            ));

            while($query -> have_posts()) {
               $query-> the_post(); ?>
               <div class="row">
           <div class="col-8 mx-auto text-center">
              <h3 class="mb-5 pb-2 display-5 experience-title"><?php echo get_field('experience_primary_title'); ?></h3>
              <p class="mb-5 exp-text"><?php echo get_field('experience_content'); ?></p>
              <div class="tech-stack">
                  <h4 class="text-white mb-5"><i><?php echo get_field('experience_secondary_title'); ?></i></h4>
                  <div class="row techs mx-auto justify-content-center">
                    <?php the_content(); ?>
                  </div>
                </div>
            </div>
         </div>
            <?php }
            wp_reset_postdata();
        ?>
      </div>
   </section>
   <!-- WORK Section -->
   <section id="work" class="mt-5 mb-5 text-center pb-5">
      <div class="container">
         <div class="row">
            <div class="col-8 mx-auto">
               <h1 class="pb-2 display-5">Projects I've completed</h1>
            </div>
         </div>
         <!-- Projects -->
         <div class="row">
            <?php 
               $query = new WP_Query(array(
                  'post_type' => 'project',
               ));

               while($query -> have_posts()) {
                  $query -> the_post(); ?>
                  <div class="col-md-6 col-lg-4 project">
               <article>
               <?php 
                     $image = get_field('project_thumbnail');
                     if( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                  <?php endif; ?>
                  <div class="project-info-container text-white d-flex flex-column align-items-center justify-content-center">
                     <div class="project-info-content">
                        <div class="project-info-top">
                           <h3 class="project-name">
                              <?php the_title(); ?>
                           </h3>
                           <p class="project-techs">
                           <?php the_terms( $post->ID, "technologies", "", "/" ); ?>
                           </p>
                        </div>
                        <?php 
                        $link = get_field("view_project");
                        if( $link ): ?>
                           <a class="btn d-block project-btn text-white" href="<?php echo esc_url( $link ); ?>" target="_blank">
                           View Project <i class="far fa-eye"></i>
                        </a>
                        <?php endif; ?>
                        <?php 
                        $link = get_field("project_source_code");
                        if( $link ): ?>
                           <a class="btn d-block project-btn text-white" href="<?php echo esc_url( $link ); ?>" target="_blank">
                           View Code <i class="fab fa-github-alt"></i>
                        </a>
                        </a>
                        <?php endif; ?>
                     </div>
                  </div>
               </article>
            </div>
               <?php }
               wp_reset_postdata();
            ?>
         </div>
      </div>
   </section>
   <section id="contactus" class="mt-5 mb-5 text-center">
      <div class="container">
         <div class="row">
            <div class="col-8 mx-auto">
               <h1 class="pb-2 display-5 contactus-title mb-5">Contact Us</h1>   	
               <?php echo do_shortcode('[wpforms id="96" title="false"]'); ?>
            </div>
         </div>
      </div>   
   </section>      
   
<?php get_footer(); ?>