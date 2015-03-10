<?php
/**
 * The 404 page (Not Found) template file.
 * @package PhotoStory
 * @since PhotoStory 1.0.0
*/
get_header(); ?>  
  <div id="content">
    <div class="content-headline">
      <h1 class="entry-headline"><?php _e( 'Nothing Found', 'photostory' ); ?></h1> 
<?php photostory_get_breadcrumb(); ?>   
    </div>    
    <div class="entry-content">
<p><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help you to find a related content.', 'photostory' ); ?></p><?php get_search_form(); ?>
    </div>  
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>