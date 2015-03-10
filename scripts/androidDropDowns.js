$(document).ready(function(){
    if(Modernizr.touch){
        $('#menu-mainmenu').on('click', '> li', function(e){
            if(!$(this).data('open')){
                e.preventDefault();
            }
            $(this).data('open', true);
        });
    }
});