jQuery(document).ready(function(){
    if(Modernizr.touch){
        jQuery('#topnav').on('click', 'li.menu-item > a', function(e){
            if(!jQuery(this).data('open')){
                e.preventDefault();
                return false;
            }
            jQuery(this).data('open', true);
        });
    }
});