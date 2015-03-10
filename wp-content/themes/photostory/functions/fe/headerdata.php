<?php
/**
 * Headerdata of Theme options.
 * @package PhotoStory
 * @since PhotoStory 1.0.0
*/  

// additional js and css
if(	!is_admin()){
function photostory_fonts_include () {
global $photostory_options_db;
// Google Fonts
$bodyfont = $photostory_options_db['photostory_body_google_fonts'];
$headingfont = $photostory_options_db['photostory_headings_google_fonts'];
$descriptionfont = $photostory_options_db['photostory_description_google_fonts'];
$headlinefont = $photostory_options_db['photostory_headline_google_fonts'];
$headlineboxfont = $photostory_options_db['photostory_headline_box_google_fonts'];
$postentryfont = $photostory_options_db['photostory_postentry_google_fonts'];
$sidebarfont = $photostory_options_db['photostory_sidebar_google_fonts'];
$menufont = $photostory_options_db['photostory_menu_google_fonts'];

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$headlineboxfonturl = $fonturl.$headlineboxfont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('photostory-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('photostory-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('photostory-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('photostory-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('photostory-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('photostory-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('photostory-google-font7', $menufonturl);
		 }
     if ($headlineboxfont != 'default' && $headlineboxfont != ''){
      wp_enqueue_style('photostory-google-font8', $headlineboxfonturl); 
		 }
}
add_action( 'wp_enqueue_scripts', 'photostory_fonts_include' );
}

// additional js and css
function photostory_css_include () {
global $photostory_options_db;    
		if ($photostory_options_db['photostory_css'] == 'Blue' ){
			wp_enqueue_style('photostory-style-blue', get_template_directory_uri().'/css/blue.css');
		}
    
    if ($photostory_options_db['photostory_css'] == 'Green' ){
			wp_enqueue_style('photostory-style-green', get_template_directory_uri().'/css/green.css');
		}
    
    if ($photostory_options_db['photostory_css'] == 'Orange' ){
			wp_enqueue_style('photostory-style-orange', get_template_directory_uri().'/css/orange.css');
		}
    
    if ($photostory_options_db['photostory_css'] == 'Tan' ){
			wp_enqueue_style('photostory-style-tan', get_template_directory_uri().'/css/tan.css');
		}
}
add_action( 'wp_enqueue_scripts', 'photostory_css_include' );

// Custom background
function photostory_get_custom_background() {
    $background_color = get_background_color();
    $background_image = get_background_image(); 
    if ($background_color != '' || $background_image != '') { ?>
		<?php _e('html body { background: none; }', 'photostory'); ?>
<?php } 
}

// Background Pattern Opacity
function photostory_get_background_pattern_opacity() {
global $photostory_options_db;
    $background_pattern_opacity = $photostory_options_db['photostory_background_pattern_opacity']; 
		if ($background_pattern_opacity != '' && $background_pattern_opacity != '100' && $background_pattern_opacity != 'Default') { ?>
		<?php echo '#wrapper .pattern { opacity: 0.'; ?><?php echo $background_pattern_opacity ?><?php echo '; filter: alpha(opacity='; ?><?php echo $background_pattern_opacity ?><?php echo '); }'; ?>
<?php } 
    elseif ($background_pattern_opacity == '100') { ?>
    <?php echo '#wrapper .pattern { opacity: 1; filter: alpha(opacity=100); }';
}  
} 

// Content Background Opacity
function photostory_get_content_background_opacity() {
global $photostory_options_db;
    $content_background_opacity = $photostory_options_db['photostory_content_background_opacity']; 
		if ($content_background_opacity != '' && $content_background_opacity != '100' && $content_background_opacity != 'Default') { ?>
		<?php echo '#wrapper .content-background { opacity: 0.'; ?><?php echo $content_background_opacity ?><?php echo '; filter: alpha(opacity='; ?><?php echo $content_background_opacity ?><?php echo '); }'; ?>
<?php } 
    elseif ($content_background_opacity == '100') { ?>
    <?php echo '#wrapper .content-background { opacity: 1; filter: alpha(opacity=100); }';
}  
} 

// Display sidebar
function photostory_display_sidebar() {
global $photostory_options_db;
    $display_sidebar = $photostory_options_db['photostory_display_sidebar']; 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('#wrapper #container #main-content #content { width: 100%; }', 'photostory'); ?>
<?php } 
}

// Display Menu Box - container width
function photostory_display_menu() {
global $photostory_options_db;
    $display_menu = $photostory_options_db['photostory_display_menu']; 
		if ($display_menu == 'Hide') { ?>
		<?php _e('#wrapper #container { max-width: 825px; } @media screen and (max-width: 1100px) { #wrapper #container #page {margin-top: 0;} }', 'photostory'); ?>
<?php } 
}

// Menu Box Position
function photostory_menu_position() {
global $photostory_options_db;
    $menu_position = $photostory_options_db['photostory_menu_position']; 
		if ($menu_position == 'Absolute') { ?>
		<?php _e('body #container .menu-box { position: absolute; left: 0; top: 0; } #wrapper .menu-box .scroll-top { display: none !important; } .rtl #container .menu-box { left: auto; right: 0; }', 'photostory'); ?>
<?php } 
}

// Display Meta Box on posts - post entries styling
function photostory_display_meta_post_entry() {
global $photostory_options_db;
    $display_meta_post_entry = $photostory_options_db['photostory_display_meta_post']; 
		if ($display_meta_post_entry == 'Hide') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-content { margin-bottom: -4px; }', 'photostory'); ?>
<?php } 
}

// FONTS
// Body font
function photostory_get_body_font() {
global $photostory_options_db;
    $bodyfont = $photostory_options_db['photostory_body_google_fonts'];
    if ($bodyfont != 'default' && $bodyfont != '') { ?>
    <?php _e('html body, #wrapper table td, #wrapper blockquote, #wrapper q, #wrapper #container #comments .comment, #wrapper #container #comments .comment time, #wrapper #container #commentform .form-allowed-tags, #wrapper #container #commentform p, #wrapper input, #wrapper button, #wrapper select { font-family: "', 'photostory'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'photostory'); ?>
<?php } 
}

// Site title font
function photostory_get_headings_google_fonts() {
global $photostory_options_db;
    $headingfont = $photostory_options_db['photostory_headings_google_fonts']; 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #header .site-title { font-family: "', 'photostory'); ?><?php echo $headingfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'photostory'); ?>
<?php } 
}

// Site description font
function photostory_get_description_font() {
global $photostory_options_db;
    $descriptionfont = $photostory_options_db['photostory_description_google_fonts']; 
    if ($descriptionfont != 'default' && $descriptionfont != '') { ?>
    <?php _e('#wrapper #header .site-description {font-family: "', 'photostory'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'photostory'); ?>
<?php } 
}

// Headlines font
function photostory_get_headlines_font() {
global $photostory_options_db;
    $headlinefont = $photostory_options_db['photostory_headline_google_fonts'];
    if ($headlinefont != 'default' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #container .navigation .section-heading { font-family: "', 'photostory'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'photostory'); ?>
<?php } 
}

// PhotoStory Posts Widgets headlines font
function photostory_get_headline_box_google_fonts() {
global $photostory_options_db;
    $headline_box_google_fonts = $photostory_options_db['photostory_headline_box_google_fonts']; 
		if ($headline_box_google_fonts != 'default' && $headline_box_google_fonts != '') { ?>
		<?php _e('#wrapper #container #main-content section .entry-headline { font-family: "', 'photostory'); ?><?php echo $headline_box_google_fonts ?><?php _e('", Arial, Helvetica, sans-serif; }', 'photostory'); ?>
<?php } 
}

// Post entry font
function photostory_get_postentry_font() {
global $photostory_options_db;
    $postentryfont = $photostory_options_db['photostory_postentry_google_fonts']; 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline { font-family: "', 'photostory'); ?><?php echo $postentryfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'photostory'); ?>
<?php } 
}

// Sidebar and Footer widget headlines font
function photostory_get_sidebar_widget_font() {
global $photostory_options_db;
    $sidebarfont = $photostory_options_db['photostory_sidebar_google_fonts'];
    if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget .sidebar-headline, #wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "', 'photostory'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'photostory'); ?>
<?php } 
}

// Menu font
function photostory_get_menu_font() {
global $photostory_options_db;
    $menufont = $photostory_options_db['photostory_menu_google_fonts']; 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper #container .menu-box ul li a { font-family: "', 'photostory'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'photostory'); ?>
<?php } 
}

// User defined CSS.
function photostory_get_own_css() {
global $photostory_options_db;
    $own_css = $photostory_options_db['photostory_own_css']; 
		if ($own_css != '') { ?>
		<?php echo esc_attr($own_css); ?>
<?php } 
}

// Display custom CSS.
function photostory_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php photostory_get_own_css(); ?>
<?php photostory_get_custom_background(); ?>
<?php photostory_get_background_pattern_opacity(); ?>
<?php photostory_get_content_background_opacity(); ?>
<?php photostory_display_sidebar(); ?>
<?php photostory_display_menu(); ?>
<?php photostory_menu_position(); ?>
<?php photostory_display_meta_post_entry(); ?>
<?php photostory_get_body_font(); ?>
<?php photostory_get_headings_google_fonts(); ?>
<?php photostory_get_description_font(); ?>
<?php photostory_get_headlines_font(); ?>
<?php photostory_get_headline_box_google_fonts(); ?>
<?php photostory_get_postentry_font(); ?>
<?php photostory_get_sidebar_widget_font(); ?>
<?php photostory_get_menu_font(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'photostory_custom_styles');	?>