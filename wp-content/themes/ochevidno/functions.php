<?php 

/**
 * Добавление возможностей
 */
if (! function_exists('ochevidno_setup')) {
  function ochevidno_setup() {
    add_theme_support('custom-logo', [
      'height'      => 44,
      'width'       => 165,
      'flex-width'  => false,
      'flex-height' => false,
      'header-text' => '',
      'unlink-homepage-logo' => false,
    ] );
    add_theme_support('title-tag');
  }
  add_action('after_setup_theme', 'ochevidno_setup');
}


/**
 * Подключение стилей и скриптов
 */
function ochevidno_scripts() {
  // STYLES
  // Main style
  wp_enqueue_style('main', get_template_directory_uri());
  // Fancybox
  wp_enqueue_style('fancybox', get_template_directory_uri() . '/dist/css/fancybox.min.css');
  // Owl carousel
  wp_enqueue_style('owl', get_template_directory_uri() . '/dist/css/owl.carousel.min.css');
  // App style
  wp_enqueue_style('app', get_template_directory_uri() . '/dist/css/style.min.css');

  // SCRIPTS
  // Jquery
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', get_template_directory_uri() . '/dist/js/jquery-3.4.1.min.js', array(), null, true);
  wp_enqueue_script('jquery');
  // Owl carousel
  wp_enqueue_script('owl', get_template_directory_uri() . '/dist/js/owl.carousel.min.js', array('jquery'), null, true);
  // Fancybox
  wp_enqueue_script('fancybox', get_template_directory_uri() . '/dist/js/jquery.fancybox.min.js', array('jquery'), null, true);
  // App
  wp_enqueue_script('app', get_template_directory_uri() . '/dist/js/app.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'ochevidno_scripts');



