<?php

/** Do theme setup on the 'after_setup_theme' hook. */
	add_action( 'after_setup_theme', 'zilch_theme_setup' );

/** Theme setup function. */
function zilch_theme_setup() {
	
/** Add theme support for Feed Links. */
	add_theme_support( 'automatic-feed-links' );
	
/** Add theme support for Custom Background. */
	add_theme_support( 'custom-background', array( 'default-color' => 'fff' ) );
	
}

/*
* Make theme available for translation.
* Translations can be filed in the /languages/ directory.
*/
function zilch_load_theme_textdomain() {
	load_theme_textdomain( 'zilch', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
	add_action( 'after_setup_theme', 'zilch_load_theme_textdomain' );


/** Add custom header image **/
$args = array(
	'width'         => 980,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/images/headers/header-default.png',
	'uploads'       => true,
);
	add_theme_support( 'custom-header', $args );

/*
 * Set up the content width value based on the theme's design.
 *
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 980;

/** zilch Post Comments */
function zilch_post_comments() {
	
	if ( ( ! comments_open() || post_password_required() ) ) {
		return;
	}

	ob_start();
	comments_number( __( 'Leave a Comment', 'zilch' ), __( '1 Comment', 'zilch' ), __( '% Comments', 'zilch' ) );
	$comments = ob_get_clean();
	
	/** Output */
	$comments = sprintf( '<a href="%s">%s</a>', esc_url( get_comments_link() ), $comments );
	$output = sprintf( '%2$s<span class="comments-link">%1$s</span>', $comments, zilch_entry_meta_sep() );
	return $output;
}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

/** zilch Entry Meta Separator */
function zilch_entry_meta_sep() {
	
	$output = '<span class="entry-meta-sep"> , </span>';
	return $output;

}

/** zilch Post Sticky */
function zilch_post_sticky() {	
	$output = '';	
	if ( is_sticky() ) { 
		$output = sprintf( '%2$s <span class="entry-meta-featured">%1$s</span>', __( 'Featured', 'zilch' ), zilch_entry_meta_sep() );
	}	
	return $output;
}

/** zilch Post Edit Link */
function zilch_post_edit_link() {
	/** Manipulation */	
	ob_start();
	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) :
	edit_post_link( __( 'Edit', 'zilch' ), sprintf( '%1$s<span class="edit-link">', zilch_entry_meta_sep() ), '</span>' );
	else:
	edit_post_link( __( 'Edit', 'zilch' ), '<span class="edit-link">', '</span>' );
	endif;
	$output = ob_get_clean();	
	return $output;
}

/** zilch Post Author */
function zilch_post_author() {
	
	$output = sprintf( '%3$s<span class="entry-author author vcard"><a href="%1$s" title="'. __( 'by %2$s', 'zilch' ) .'" rel="author">%2$s</a></span>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ), zilch_entry_meta_sep() );
	return $output;

}

/** zilch Post Categories */
function zilch_post_category() {	
	$categories_list = get_the_category_list( ', ' );
	if ( ! $categories_list ) {
		return;
	}		
	$output = sprintf( '<span class="cat-links"><span class="%1$s">'. __( 'Posted in:', 'zilch' ) .'</span> %2$s</span>', 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
	return $output;
}

/** zilch Post Tags */
function zilch_post_tags() {	
	$tags_list = get_the_tag_list( '', ', ' );
	if ( ! $tags_list ) {
		return;
	}		
	$output = sprintf( '%3$s<span class="tag-links"><span class="%1$s">'. __( 'Tagged:', 'zilch' ) .'</span> %2$s</span>', 'entry-utility-prep entry-utility-prep-tag-links', $tags_list, zilch_entry_meta_sep() );
	return $output;
}

/** Menu **/
	register_nav_menus( array('primary' => __( 'Primary Menu', 'zilch' ), ) );

/** Add first and last class into menu **/

// adds a unique class to the first and last items in the list
function add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
  $output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}
	add_filter('wp_nav_menu', 'add_first_and_last');

// adds a unique class to the first and last items in the list
function add_markup_pages($output) {
$output= preg_replace('/page-item/', ' first-page-item page-item', $output, 1);
$output=substr_replace($output, " last-page-item page-item", strripos($output, "page-item"), strlen("page-item"));
return $output;
}
	add_filter('wp_list_pages', 'add_markup_pages');

/** Register widget areas. */
	add_action( 'widgets_init', 'zilch_register_sidebars' );

/** Registers the the core sidebars */
function zilch_register_sidebars() {

	/* Get the available core framework sidebars. */
	$sidebars = zilch_sidebars();
	
	/* Loop through the supported sidebars. */
	foreach ( $sidebars as $key => $val ) {
		

		/* Set up some default sidebar arguments. */
		$defaults = array(
		  'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-%2$s clearfix"><div class="widget-wrap widget-inside">',
		  'after_widget'	=> '</div></div>',
		  'before_title'	=> '<h3 class="widget-title">',
		  'after_title'	=> '</h3>'
		);
		
		/* Parse the sidebar arguments and defaults. */
		$args = wp_parse_args( $sidebars[$key], $defaults );
		
		/* Register the sidebar. */
		register_sidebar( $args );
		
	}

}

/** Returns an array of the core framework's available sidebars for use in theme */
function zilch_sidebars() {

	/* Set up an array of sidebars. */
	$sidebars = array(
		
		'zilch-primary-sidebar' => array(
			'name' => __( 'Zilch Primary Sidebar', 'zilch' ),
			'id' => 'zilch-primary-sidebar',
			'description' => __( 'The main (primary) widget area, most often used as a sidebar.', 'zilch' )
		)
	);

	/* Return the sidebars. */
	return $sidebars;
}

/** zilch Footer */
	add_action( 'zilch_footer', 'zilch_footer_init' );
function zilch_footer_init() {
	
	/** Footer Copyright Logic */
	$zilch_copyright_code = '&copy; Copyright '. date( 'Y' ) .' - <a href="'. home_url( '/' ) .'">'. get_bloginfo( 'name' ) .'</a>';

?>
<div class="grid_16">
  <?php echo $zilch_copyright_code; ?>
</div>

<?php	
}

?>
<?php
function zilch_scripts() {
	wp_enqueue_style( 'default-style', get_stylesheet_uri() );
	wp_enqueue_style( 'grid-style', get_template_directory_uri() . '/css/960.css' );
}

add_action( 'wp_enqueue_scripts', 'zilch_scripts' );
?>