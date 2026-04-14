<?php
// elimina el wp bar del front
add_filter('show_admin_bar', '__return_false');


add_action('after_setup_theme', function(){
  add_theme_support('post-thumbnails');
  add_theme_support( 'title-tag' );  
});


add_action('wp_head', function(){
  ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">

  <?php
  
});


add_action('init', function(){
  //Remove headers
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'wp_generator');

  //Remove all emojis
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
});


add_action( 'admin_enqueue_scripts', function(){
   if (is_admin()) {
      wp_enqueue_media();
      wp_enqueue_editor();
   }
});

add_action('wp_enqueue_scripts', function() {
  wp_enqueue_style('swiper-css', get_template_directory_uri().'/vendor/swiper/swiper-bundle.min.css', array(), null);
  wp_enqueue_script('swiper-js', get_template_directory_uri().'/vendor/swiper/swiper-bundle.min.js', array(), null, true);
  
  wp_enqueue_style('base-styles', get_template_directory_uri().'/base/base.css');
  wp_enqueue_style('main-styles', get_template_directory_uri().'/style.css');
  wp_enqueue_script('moonrise-js', get_template_directory_uri().'/base/moonrise-utils.js', array(), '1.0', true);
  wp_enqueue_script('svg-inject-js', get_template_directory_uri().'/base/svg-inject.min.js', array(), '1.0', true);
  wp_enqueue_script('lazy-media-js', get_template_directory_uri().'/base/lazy-media.js', array(), '1.0', true);
  
  wp_enqueue_script('functions-js', get_template_directory_uri().'/scripts/functions.js', array(), '1.0', true);
  


  // remove
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('classic-editor-styles');
  wp_dequeue_style('classic-theme-styles');
  wp_dequeue_style('global-styles');

  if (is_single()) {
      wp_enqueue_style('wp-block-library');
  }

},100);




function add_custom_mime_types($mime_types){
    $mime_types['pdf'] = 'application/pdf';
    return $mime_types;
}
add_filter('upload_mimes', 'add_custom_mime_types', 1, 1);




// contact form 7
// remove <p> and <br> from the contact form
add_filter('wpcf7_autop_or_not', '__return_false');


