<?php
/**
 * The search results template file.
 * @package PhotoStory
 * @since PhotoStory 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>  
  <div id="content">   
    <div class="content-headline">
      <h1 class="entry-headline"><?php printf( __( 'Search Results for: %s', 'photostory' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
<?php photostory_get_breadcrumb(); ?>
    </div>
    <div class="archive-meta"><p class="number-of-results"><?php _e( 'Number of Results: ', 'photostory' ); ?><?php echo $wp_query->found_posts; ?></p></div>
<?php while (have_posts()) : the_post(); ?>      
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Search results navigation', 'photostory' ); ?></h2>
      <div class="nav-wrapper">
      <div class="nav-wrapper-line"></div>
			 <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'photostory' ),
	'next_text' => __( 'Next &rarr;', 'photostory' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
        </p>
      </div>
    </div>
<?php endif; ?>

<?php else : ?>
  <div id="content">   
    <div class="content-headline">
      <h1 class="entry-headline"><?php _e( 'Nothing Found', 'photostory' ); ?></h1>
<?php photostory_get_breadcrumb(); ?>
    </div>
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'photostory' ); ?></p>
<?php get_search_form(); ?>
<?php endif; ?>
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>