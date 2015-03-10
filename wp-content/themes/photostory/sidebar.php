<?php
/**
 * The sidebar template file.
 * @package PhotoStory
 * @since PhotoStory 1.0.0
*/
?>
<?php global $photostory_options_db; ?>
<?php if ($photostory_options_db['photostory_display_sidebar'] != 'Hide') { ?>
<aside id="sidebar">
<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>
<?php endif; ?>
</aside> <!-- end of sidebar -->
<?php } ?>