<?php 
/**
 * Library of Theme options functions.
 * @package PhotoStory
 * @since PhotoStory 1.0.0
*/

// Display Breadcrumb navigation
function photostory_get_breadcrumb() { 
global $photostory_options_db;
		if ($photostory_options_db['photostory_display_breadcrumb'] != 'Hide') { ?>
		<?php if(function_exists( 'bcn_display' ) && !is_front_page()){ _e('<p class="breadcrumb-navigation">', 'photostory'); ?><?php bcn_display(); ?><?php _e('</p>', 'photostory');} ?>
<?php } 
} 

// Display featured images on single posts
function photostory_get_display_image_post() { 
global $photostory_options_db;
		if ($photostory_options_db['photostory_display_image_post'] == '' || $photostory_options_db['photostory_display_image_post'] == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
}

// Display featured images on pages
function photostory_get_display_image_page() {
global $photostory_options_db; 
		if ($photostory_options_db['photostory_display_image_page'] == '' || $photostory_options_db['photostory_display_image_page'] == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
} ?>