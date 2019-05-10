<?php

function university_files(){
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
  wp_enqueue_style('custom_google_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_stylesheet_uri(), NULL, microtime());
}

function university_features(){
  // This gives us a menus option is the appearance section on admin page
  // These correspond to locations where <ul> lists can be injected automagically through this admin menu page
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  register_nav_menu('footerLocation1', 'Footer Location One');
  register_nav_menu('footerLocation2', 'Footer Location Two');
  //This adds support for auto page titles
  add_theme_support('title-tag');
}

add_action('wp_enqueue_scripts', 'university_files');
add_action('after_setup_theme', 'university_features');
