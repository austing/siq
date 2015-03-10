<?php
/**
 * Template Name: Logged In
 * The template file for displaying the page content only for logged in users.
 * @package PhotoStory
 * @since PhotoStory 1.0.3
*/
get_header(); ?>
<?php if ( is_user_logged_in() ) { ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
  <div id="content">
    <div class="content-headline">
      <h1 class="entry-headline"><?php the_title(); ?></h1>
<?php photostory_get_breadcrumb(); ?>    
    </div>
<?php photostory_get_display_image_page(); ?>    
    <div class="entry-content">
<?php the_content(); ?>
<?php edit_post_link( __( 'Edit', 'photostory' ), '<p>', '</p>' ); ?>
<?php endwhile; endif; ?>
<?php comments_template( '', true ); ?>
    </div>
<?php } else { ?>
  <div id="content">
    <div class="content-headline">
      <h1 class="entry-headline"><?php the_title(); ?></h1>
<?php photostory_get_breadcrumb(); ?>    
    </div>    
    <div class="entry-content">
      <p class="logged-in-message"><?php _e( 'You must be logged in to view this page.', 'photostory' ); ?></p>
<?php wp_login_form(); ?>
    </div> 
<?php } ?> 
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>