<?php
/**
 * The page template file.
 * @package PhotoStory
 * @since PhotoStory 1.0.0
*/
get_header(); ?>
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
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>