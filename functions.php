<?php
function add_theme_scripts() {
   // Load Styles
   wp_enqueue_style( 'style', get_stylesheet_uri() );
   wp_enqueue_style('mainstyle', get_theme_file_uri('/css/main.css'));
   wp_enqueue_style('bootstrapStyle', get_theme_file_uri('/css/bootstrap.css'));
   wp_enqueue_style('fontAwesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css');
   // Load Scripts
   wp_enqueue_script('jqueryCdn', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', NULL, '1.0, true');
   wp_enqueue_script('scriptTwo', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', NULL, '1.0, true');
   wp_enqueue_script('scriptThree', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', NULL, '1.0, true');
   
 }

 add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

 // Add custom logo support
add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
   $defaults = array(
       'height'               => 100,
       'width'                => 400,
       'flex-height'          => true,
       'flex-width'           => true,
       'header-text'          => array( 'site-title', 'site-description' ),
       'unlink-homepage-logo' => true, 
   );

   add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

// Register Navigation Menu
function register_my_menus() {
   register_nav_menus(
     array(
       'header-menu' => __( 'Header Menu' )
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

/**************************** POST TYPES **************************/
/* Add thunbnail support for custom post types*/
add_theme_support( 'post-thumbnails' );
function theme_setup() {
    register_post_type( 'yourposttype', array(
        'supports' => array('title','thumbnail'),
    ));
}
add_action( 'after_setup_theme', 'theme_setup' );

// Hero post type
 function hero_post_type() {
   $labels = array(
     'name' => _x('Hero', 'post type general name'),
     'singular_name' => _x('Hero', 'post type singular name'),
     'add_new' => _x('Add Hero', 'hero'),
     'add_new_item' => __('Add hero'),
     'edit_item' => __('Edit hero'),
     'new_item' => __('hero'),
     'all_items' => __('All hero'),
     'view_item' => __('View hero'),
     'search_items' => __('Search hero'),
     'not_found' =>  __('No hero found'),
     'not_found_in_trash' => __('No hero found in Trash'), 
     'parent_item_colon' => '',
     'menu_name' => __('Showcase')
 
   );
   $args = array(
     'labels' => $labels,
     'public' => true,
     'publicly_queryable' => true,
     'show_ui' => true, 
     'show_in_menu' => true, 
     'query_var' => true,
     'rewrite' => true,
     'capability_type' => 'post',
     'capabilities' => array(
      'create_posts' => false, 
      ),
    'map_meta_cap' => true,
     'has_archive' => true, 
     'hierarchical' => false,
     'menu_position' => null,
     'menu_icon' => 'dashicons-admin-home',
     'supports' => array( 'title')
   ); 
   register_post_type('hero',$args);
 }
 add_action( 'init', 'hero_post_type' );  

 // About Post Type
 function about_post_type() {
   $labels = array(
     'name' => _x('About', 'post type general name'),
     'singular_name' => _x('About', 'post type singular name'),
     'add_new' => _x('Add About', 'About'),
     'add_new_item' => __('Add About'),
     'edit_item' => __('Edit About'),
     'new_item' => __('About'),
     'all_items' => __('All About'),
     'view_item' => __('View About'),
     'search_items' => __('Search About'),
     'not_found' =>  __('No About found'),
     'not_found_in_trash' => __('No About found in Trash'), 
     'parent_item_colon' => '',
     'menu_name' => __('About')
 
   );
   $args = array(
     'labels' => $labels,
     'public' => true,
     'publicly_queryable' => true,
     'show_ui' => true, 
     'show_in_menu' => true, 
     'query_var' => true,
     'rewrite' => true,
     'capability_type' => 'post',
     'capabilities' => array(
      'create_posts' => true, 
      ),
    'map_meta_cap' => true,
     'has_archive' => true, 
     'hierarchical' => false,
     'menu_position' => null,
     'menu_icon' => 'dashicons-admin-comments',
     'supports' => array( 'title')
   ); 
   register_post_type('about',$args);
 }
 add_action( 'init', 'about_post_type' );  

 // Experience Post Type
 function experience_post_type() {
   $labels = array(
     'name' => _x('experience', 'post type general name'),
     'singular_name' => _x('experience', 'post type singular name'),
     'add_new' => _x('Add experience', 'experience'),
     'add_new_item' => __('Add experience'),
     'edit_item' => __('Edit experience'),
     'new_item' => __('experience'),
     'all_items' => __('All experience'),
     'view_item' => __('View experience'),
     'search_items' => __('Search experience'),
     'not_found' =>  __('No experience found'),
     'not_found_in_trash' => __('No experience found in Trash'), 
     'parent_item_colon' => '',
     'menu_name' => __('Experience')
 
   );
   $args = array(
     'labels' => $labels,
     'public' => true,
     'publicly_queryable' => true,
     'show_ui' => true, 
     'show_in_menu' => true, 
     'query_var' => true,
     'rewrite' => true,
     'capability_type' => 'post',
     'capabilities' => array(
      'create_posts' => false, 
      ),
    'map_meta_cap' => true,
     'has_archive' => true, 
     'hierarchical' => false,
     'menu_position' => null,
     'menu_icon' => 'dashicons-dashboard',
     'supports' => array( 'title','editor')
   ); 
   register_post_type('experience',$args);
 }
 add_action( 'init', 'experience_post_type' );  

 // Project Post Type
 function project_post_type() {
   $labels = array(
     'name' => _x('Projects', 'post type general name'),
     'singular_name' => _x('Project', 'post type singular name'),
     'add_new' => _x('Add Project', 'Project'),
     'add_new_item' => __('Add Project'),
     'edit_item' => __('Edit Project'),
     'new_item' => __('Project'),
     'all_items' => __('All Projects'),
     'view_item' => __('View Project'),
     'search_items' => __('Search Project'),
     'not_found' =>  __('No Project found'),
     'not_found_in_trash' => __('No Project found in Trash'), 
     'parent_item_colon' => '',
     'menu_name' => __('Projects')
 
   );
   $args = array(
     'labels' => $labels,
     'public' => true,
     'publicly_queryable' => true,
     'show_ui' => true, 
     'show_in_menu' => true, 
     'query_var' => true,
     'rewrite' => true,
     'capability_type' => 'post',
     'capabilities' => array(
      'create_posts' => true, 
      ),
    'map_meta_cap' => true,
     'has_archive' => true, 
     'hierarchical' => false,
     'menu_position' => null,
     'menu_icon' => 'dashicons-admin-generic',
     'supports' => array( 'title')
   ); 
   register_post_type('project',$args);
 }
 add_action( 'init', 'project_post_type' ); 

 // Taxonomies
add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
//create a custom taxonomy name it subjects for your posts 
function create_subjects_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Technologies', 'taxonomy general name' ),
    'singular_name' => _x( 'Technology', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Technologies' ),
    'all_items' => __( 'All Technologies' ),
    'parent_item' => __( 'Parent Technology' ),
    'parent_item_colon' => __( 'Parent Technology:' ),
    'edit_item' => __( 'Edit Technology' ), 
    'update_item' => __( 'Update Technology' ),
    'add_new_item' => __( 'Add New Technology' ),
    'new_item_name' => __( 'New Technology Name' ),
    'menu_name' => __( 'Technologies' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('technologies',array('project'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'technology' ),
  ));
 
}