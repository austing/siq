<?php
/**
 * The header template file.
 * @package PhotoStory
 * @since PhotoStory 1.0.0
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php global $photostory_options_db; ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="viewport" content="width=device-width" />  
  <title><?php wp_title( '|', true, 'right' ); ?></title>  
<?php if ($photostory_options_db['photostory_favicon_url'] != ''){ ?>
	<link rel="shortcut icon" href="<?php echo esc_url($photostory_options_db['photostory_favicon_url']); ?>" />
<?php } ?>
<?php wp_head(); ?>  
</head>
 
<body <?php body_class(); ?> id="wrapper">
<?php if ( $photostory_options_db['photostory_display_background_pattern'] != 'Hide' ) { ?>
<div class="pattern"></div> 
<?php } ?> 
<div id="container">
<?php if ( $photostory_options_db['photostory_display_menu'] != 'Hide' && !is_page_template('template-landing-page.php') ) { ?>
  <div class="menu-box">
  <div class="content-background"></div>
<?php if ( get_header_image() != '' ) { ?> 
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="site-logo" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } ?>
<?php wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); ?>
  <div class="scroll-top"></div>
  </div>
<?php } ?>  
<div id="page">
  <header id="header">
    <div class="header-content">
      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
<?php if ( $photostory_options_db['photostory_display_site_description'] != 'Hide' ) { ?>
      <p class="site-description"><?php bloginfo( 'description' ); ?></p>
<?php } ?>
    </div>
  </header> <!-- end of header -->
  <div id="main-content">
  <div class="content-background"></div>