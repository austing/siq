<?php
/**
 * PhotoStory functions and definitions.
 * @package PhotoStory
 * @since PhotoStory 1.0.0
*/

/**
 * PhotoStory theme variables.
 *  
*/    
$photostory_themename = "PhotoStory";			//Theme Name
$photostory_themever = "1.1.6";									//Theme version
$photostory_shortname = "photostory";							//Shortname 
$photostory_manualurl = get_template_directory_uri() . '/docs/documentation.html';	//Manual Url
// Set path to PhotoStory Framework and theme specific functions
$photostory_be_path = get_template_directory() . '/functions/be/';									//BackEnd Path
$photostory_fe_path = get_template_directory() . '/functions/fe/';									//FrontEnd Path 
$photostory_be_pathimages = get_template_directory_uri() . '/functions/be/images';		//BackEnd Path
$photostory_fe_pathimages = get_template_directory_uri() . '';	//FrontEnd Path
//Include Framework [BE] 
require_once ($photostory_be_path . 'fw-options.php');	 	 // Framework Init  
// Include Theme specific functionality [FE] 
require_once ($photostory_fe_path . 'headerdata.php');		 // Include css and js
require_once ($photostory_fe_path . 'library.php');	       // Include library, functions
require_once ($photostory_fe_path . 'widget-posts-default.php');// Posts-Default Widget

/**
 * PhotoStory theme basic setup.
 *  
*/
function photostory_setup() {
	// Makes PhotoStory available for translation.
	load_theme_textdomain( 'photostory', get_template_directory() . '/languages' );
  // This theme styles the visual editor to resemble the theme style.
  add_editor_style( 'editor-style.css' );
	// Adds RSS feed links to <head> for posts and comments.  
	add_theme_support( 'automatic-feed-links' );
	// This theme supports custom background color and image.
	$defaults = array(
	'default-color' => '', 
  'default-image' => '',
	'wp-head-callback' => '_custom_background_cb',
	'admin-head-callback' => '',
	'admin-preview-callback' => '' );  
  add_theme_support( 'custom-background', $defaults );
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 765, 9999 );
  // This theme uses a custom header background image.
  $args = array(
	'width' => 205,
  'flex-width' => true,
  'flex-height' => true,
  'header-text' => false,);
  add_theme_support( 'custom-header', $args );
  global $content_width;
  if ( ! isset( $content_width ) ) { $content_width = 525; }
}
add_action( 'after_setup_theme', 'photostory_setup' );

/**
 * Enqueues scripts and styles for front-end.
 *
*/
function photostory_scripts_styles() {
	global $wp_styles, $wp_scripts;
	// Adds JavaScript
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script( 'photostory-placeholders', get_template_directory_uri() . '/js/placeholders.min.js', array(), '3.0.2', true );
    wp_enqueue_script( 'photostory-scroll-to-top', get_template_directory_uri() . '/js/scroll-to-top.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'photostory-menubox', get_template_directory_uri() . '/js/menubox.js', array(), '1.0', true );
    wp_enqueue_script( 'photostory-selectnav', get_template_directory_uri() . '/js/selectnav.js', array(), '0.1', true );
    wp_enqueue_script( 'photostory-responsive', get_template_directory_uri() . '/js/responsive.js', array(), '1.0', true );
    wp_enqueue_script( 'photostory-html5-ie', get_template_directory_uri() . '/js/html5.js', array(), '3.6', false );
    $wp_scripts->add_data( 'photostory-html5-ie', 'conditional', 'lt IE 9' );
	// Loads the main stylesheet.
	  wp_enqueue_style( 'photostory-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'photostory_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text.
 *  
*/
function photostory_wp_title( $title, $sep ) {
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	return $title;
}
add_filter( 'wp_title', 'photostory_wp_title', 10, 2 );

/**
 * Register our menu.
 *
 */
function photostory_register_my_menu() {
  register_nav_menu( 'main-navigation', __( 'Fixed Menu', 'photostory' ) );
}
add_action( 'after_setup_theme', 'photostory_register_my_menu' );

/**
 * Register our sidebars and widgetized areas.
 *
*/
function photostory_widgets_init() {
  register_sidebar( array(
		'name' => __( 'Right Sidebar', 'photostory' ),
		'id' => 'sidebar-1',
		'description' => __( 'Right sidebar which appears on all posts and pages.', 'photostory' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => ' <p class="sidebar-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer left widget area', 'photostory' ),
		'id' => 'sidebar-2',
		'description' => __( 'Left column with widgets in footer.', 'photostory' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer middle widget area', 'photostory' ),
		'id' => 'sidebar-3',
		'description' => __( 'Middle column with widgets in footer.', 'photostory' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer right widget area', 'photostory' ),
		'id' => 'sidebar-4',
		'description' => __( 'Right column with widgets in footer.', 'photostory' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer notices', 'photostory' ),
		'id' => 'sidebar-5',
		'description' => __( 'The line for copyright and other notices below the footer widget areas. Insert here one Text widget. The "Title" field at this widget should stay empty.', 'photostory' ),
		'before_widget' => '<div class="footer-signature"><div class="footer-signature-content">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
  register_sidebar( array(
		'name' => __( 'Latest Posts Homepage widget area', 'photostory' ),
		'id' => 'sidebar-6',
		'description' => __( 'The area for any PhotoStory Posts Widgets, which displays the latest posts from a specific category below the default Latest Posts area.', 'photostory' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'photostory_widgets_init' );

/**
 * Post excerpt settings.
 *
*/
function photostory_custom_excerpt_length( $length ) {
return 40;
}
add_filter( 'excerpt_length', 'photostory_custom_excerpt_length', 20 );
function photostory_new_excerpt_more( $more ) {
global $post;
return '... <a class="read-more-button" href="'. esc_url( get_permalink($post->ID) ) . '">' . __( '(Read more)', 'photostory' ) . '</a>';}
add_filter( 'excerpt_more', 'photostory_new_excerpt_more' );

if ( ! function_exists( 'photostory_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
*/
function photostory_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'photostory' ); ?></h2>
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
	<?php endif;
}
endif;

/**
 * Displays navigation to next/previous posts on single posts pages.
 *
*/
function photostory_prev_next($nav_id) { ?>
<?php $photostory_previous_post = get_adjacent_post( false, "", true );
$photostory_next_post = get_adjacent_post( false, "", false ); ?>
<div id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
	<div class="nav-wrapper">
  <div class="nav-wrapper-line"></div>
<?php if ( !empty($photostory_previous_post) ) { ?>
  <p class="nav-previous"><a href="<?php echo esc_url(get_permalink($photostory_previous_post->ID)); ?>" title="<?php echo esc_attr($photostory_previous_post->post_title); ?>"><?php _e( '&larr; Previous post', 'photostory' ); ?></a></p>
<?php } if ( !empty($photostory_next_post) ) { ?>
	<p class="nav-next"><a href="<?php echo esc_url(get_permalink($photostory_next_post->ID)); ?>" title="<?php echo esc_attr($photostory_next_post->post_title); ?>"><?php _e( 'Next post &rarr;', 'photostory' ); ?></a></p>
<?php } ?>
   </div>
</div>
<?php } 

if ( ! function_exists( 'photostory_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
*/
function photostory_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'photostory' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'photostory' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<span><b class="fn">%1$s</b> %2$s</span>',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span>' . __( '(Post author)', 'photostory' ) . '</span>' : ''
					);
					printf( '<time datetime="%2$s">%3$s</time>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						// translators: 1: date, 2: time
						sprintf( __( '%1$s at %2$s', 'photostory' ), get_comment_date(''), get_comment_time() )
					);
				?>
			</div><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'photostory' ); ?></p>
			<?php endif; ?>

			<div class="comment-content comment">
				<?php comment_text(); ?>
			 <div class="reply">
			   <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'photostory' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			   <?php edit_comment_link( __( 'Edit', 'photostory' ), '<p class="edit-link">', '</p>' ); ?>
			</div><!-- .comment-content -->
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch;
}
endif;

/**
 * Function for adding custom classes to the menu objects.
 *
*/
add_filter( 'wp_nav_menu_objects', 'photostory_filter_menu_class', 10, 2 );
function photostory_filter_menu_class( $objects, $args ) {

    $ids        = array();
    $parent_ids = array();
    $top_ids    = array();
    foreach ( $objects as $i => $object ) {

        if ( 0 == $object->menu_item_parent ) {
            $top_ids[$i] = $object;
            continue;
        }
 
        if ( ! in_array( $object->menu_item_parent, $ids ) ) {
            $objects[$i]->classes[] = 'first-menu-item';
            $ids[]          = $object->menu_item_parent;
        }
 
        if ( in_array( 'first-menu-item', $object->classes ) )
            continue;
 
        $parent_ids[$i] = $object->menu_item_parent;
    }
 
    $sanitized_parent_ids = array_unique( array_reverse( $parent_ids, true ) );
 
    foreach ( $sanitized_parent_ids as $i => $id )
        $objects[$i]->classes[] = 'last-menu-item';
 
    return $objects; 
}

/**
 * Include the TGM_Plugin_Activation class.
 *  
*/
require_once get_template_directory() . '/class-tgm-plugin-activation.php'; 
add_action( 'tgmpa_register', 'photostory_my_theme_register_required_plugins' );

function photostory_my_theme_register_required_plugins() {

$plugins = array(
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => false,
		),
	);
 
 
$config = array(
		'domain'       => 'photostory',
    'menu'         => 'install-my-theme-plugins',
		'strings'    	 => array(
		'page_title'             => __( 'Install Recommended Plugins', 'photostory' ),
		'menu_title'             => __( 'Install Plugins', 'photostory' ),
		'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', 'photostory' ),
		'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', 'photostory' ),
		'button'                 => __( 'Install %s Now', 'photostory' ),
		'installing'             => __( 'Installing Plugin: %s', 'photostory' ),
		'oops'                   => __( 'Something went wrong with the plugin API.', 'photostory' ), // */
		'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', 'photostory' ),
		'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'photostory' ),
		'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', 'photostory' ),
		'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'photostory' ),
		'return'                 => __( 'Return to Recommended Plugins Installer', 'photostory' ),
),
); 
photostory_tgmpa( $plugins, $config ); 
} ?>