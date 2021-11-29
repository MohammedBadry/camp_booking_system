/*------------- #General --------------*/

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});


$('a[href="#"]').click(function ($) {
        $.preventDefault();
    });

$('.statistics-boxs .box-item').matchHeight();
$('.organizers-area .organizer-wrap .organizer-item').matchHeight();

/*------------- # Fix 100vh viewport bug on mobile devices --------------*/

let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);
window.addEventListener('resize', () => {
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});

/*------------- #tabs function   --------------*/

$(".tab-content").hide();
$(".tab-content.active").show();

$(".tab-btn").click(function(){
  
        $(".tab-btn").removeClass("active");
        $(this).addClass("active");

        var current_tab = $(this).attr("data-target");
        $(".tab-content").hide();
        $("."+current_tab).fadeIn();
    
        
    });



/*------------- #Header fixed , Header toggler-btn    --------------*/

/*
 (function () {
                var documentElem = $(document),
                        nav = $('.top-nav'),
                        lastScrollTop = 0;

                documentElem.on('scroll', function () {
                    var currentScrollTop = $(this).scrollTop();

                    //scroll down
                    if ( currentScrollTop > lastScrollTop && !$(".top-nav .navbar-menu").hasClass("active") )
                        nav.addClass('scroll');
                    //scroll up
                    else
                        nav.removeClass('scroll');

                    lastScrollTop = currentScrollTop;
                });

})();
 */ 

 $(window).scroll(function() {
          
        if ($(this).scrollTop() > 30) {
            
            $('.top-nav').addClass("fixed");
            
        } else {
            
            $('.top-nav').removeClass("fixed");
           

        }
    });

 $(".nav-content .nav-toggler").click(function () {

         $(".top-nav .navbar-menu ").addClass("active");
        
     });

 $(".close-nav").click(function () {

         $(".top-nav .navbar-menu ").removeClass("active");
        
     });



/*------------- #scroll-top btn  --------------*/


$(window).scroll(function() {
          
        if ($(this).scrollTop() > 200) {
            $('.scrollup').addClass("show");
        } else {
            $('.scrollup').removeClass("show");
            $('.scrollup').removeClass("active");

        }
    });



$('.scrollup').click(function(e){

    e.preventDefault(); 
    
    $(this).addClass('active');
    $('html,body').animate({

        scrollTop:0},150);
    });


/*------------- #show and hide password   --------------*/
   
$('.password-field .eye-icon').on('click' , function(){
       
        
       var password_input = $(this).parent().find(".password-input");
         
       if(password_input.attr('type') === 'password'){
           
           password_input.attr('type' , 'text');
           $(this).addClass('hide');
           
       }else{
           
           password_input.attr('type' , 'password');
           $(this).removeClass('hide');
       }
          
          
    });


