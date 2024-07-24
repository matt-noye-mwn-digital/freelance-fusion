import './bootstrap';

$(document).ready(function(){
    if($(window).width() >= 1081) {
        $('.sidebar').addClass('open');
        $('header .topbar button.sidebarMenuToggler').click(function(){
            $('.sidebar').toggleClass('open', 1000);
            $('main.dashboardMain').toggleClass('full', 1100);
        });
        $('button.sidebarMenuToggler').click(function(){
           $(this).find('i').toggleClass('fa-times fa-bars');
        });
    }
    if($(window).width <= 1080){
        $('.sidebar').removeClass('open');
        $('header .topbar button.sidebarMenuToggler').click(function(){
            $('.sidebar').toggleClass('open', 1000);
        });
    }
});
