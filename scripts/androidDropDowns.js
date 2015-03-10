jQuery(document).ready(function(){
//    if(Modernizr.touch){
        jQuery('#topnav li.menu-item > a').dblclick(function(e){
            jQuery(this).data('open', true);
            jQuery(this).click();
        });
        jQuery('#topnav li.menu-item > a').click(function(e){
            children = jQuery(this).parent('li').children('ul');
            if(children.length){
                if(!jQuery(this).data('open')){
                    e.preventDefault();
                }
            }
        });
//    }
});