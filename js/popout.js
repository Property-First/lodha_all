jQuery(document).ready(function($) {
//check for popup cookie if set don't open the dialog.

if (!Get_Cookie('popout')) {
        //console.log($('.popupDiv'));
        $(window).load(function(){
            // var width = $(window).width();
            // if(width >= 767){
                setTimeout(function(){
                    $('#main-pop').modal('show');
                }, 10000);
            // }
        });
    }




});


