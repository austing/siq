<div class="grid_5">
  <div id="sidebar">
  
	<?php 
    if ( ! dynamic_sidebar( 'zilch-primary-sidebar' ) ):
    ?>
    
    <div class="widget">
      <div class="widget-wrap widget-inside">
	  <?php 
        _e( '<p>This is widget area.<br> To insert widgets, navigate WordPress admin dashboard >> Themes >> Widgets <br>Add widgets into "Zilch Primary Sidebar" as per your requirements.</p>
		<p>This message will be disappear after you insert widget(s) here.', 'zilch' );
	  ?>	
      </div>
    </div>    
  
    <?php endif; ?>
  
  </div> <!-- end #sidebar -->
</div>  <!-- end .grid_5 -->