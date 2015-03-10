jQuery(document).ready(function(){
    if(Modernizr.touch){
        jQuery('#menu-mainmenu').on('click', '> li', function(e){
            if(!jQuery(this).data('open')){
                e.preventDefault();
            }
            jQuery(this).data('open', true);
        });
    }
});