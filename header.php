<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <meta name="author" content="Alejandro Bores">
    <meta name="publisher" content="Mad Orbit">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Libre+Baskerville:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>

</head>


<body>
  
<noscript>
   this web needs JavaScript to work
</noscript>


<?php wp_nonce_field( 'main_global_nonce', 'global_nonce' ); ?>


<?php 
  get_template_part('/components/section-nav');
?>

<main>



