<?php 
  if ( ! defined( 'ABSPATH' ) ) {
      exit;
  }

  /* 
    Template Name: landing 
  */

   get_header();
   

   get_template_part('/components/section-home-hero');
   get_template_part('/components/section-properties');
   get_template_part('/components/section-reviews');

   get_template_part('/components/section-about-us');

   get_template_part('/components/section-contact-us');


   get_footer();

?>