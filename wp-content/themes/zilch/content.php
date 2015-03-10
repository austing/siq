<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  
  <div class="entry-meta">    
	<?php echo get_the_date() . zilch_post_comments() . zilch_post_author() . zilch_post_sticky() . zilch_post_edit_link(); ?>
  </div><!-- .entry-meta -->  

  <div class="entry-content clearfix">	
	<?php the_content(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo wp_link_pages(); ?>
  
  <div class="entry-meta-bottom">    
  <?php echo zilch_post_category() . zilch_post_tags(); ?>    
  </div><!-- .entry-meta-bottom -->

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->