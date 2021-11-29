/*------------- #General --------------*/

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});


$('a[href="#"]').click(function ($) {
        $.preventDefault();
    });

$('.statistics-boxs .box-item').matchHeight();
$('.package-list .package-ul').matchHeight();

/*------------- # Fix 100vh viewport bug on mobile devices --------------*/

let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);
window.addEventListener('resize', () => {
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});


/*------------- #our-clients-slider --------------*/




/*------------- #Header sticky , Header toggler-btn    --------------*/


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
    

 $(".nav-content .nav-toggler").click(function () {

         $(".left-sidebar").addClass("active");
         $(".top-nav .overlay-panel").addClass("active");
        
     });

 $(".top-nav .overlay-panel , .left-sidebar .close-menu").click(function () {

         $(".left-sidebar").removeClass("active");
         $(".top-nav .overlay-panel").removeClass("active");
        
     });



/*------------- #scroll-top btn  --------------*/


$(window).scroll(function() {
          
        if ($(this).scrollTop() > 200) {
            $('.scrollup').addClass("show");
            $('.whatsapp-icon').addClass("show")
        } else {
            $('.scrollup').removeClass("show");
            $('.scrollup').removeClass("active");
            $('.whatsapp-icon').removeClass("show");

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



/*------------- #Dragging table   --------------*/

/*
 document.addEventListener('DOMContentLoaded', function () {
                const ele = document.getElementById('vv');

                let pos = { top: 0, left: 0, x: 0, y: 0 };

                const mouseDownHandler = function (e) {
                    ele.style.cursor = 'move';

                    pos = {
                        left: ele.scrollLeft,
                        top: ele.scrollTop,
                        // Get the current mouse position
                        x: e.clientX,
                        y: e.clientY,
                    };

                    document.addEventListener('mousemove', mouseMoveHandler);
                    document.addEventListener('mouseup', mouseUpHandler);
                };

                const mouseMoveHandler = function (e) {
                    // How far the mouse has been moved
                    const dx = e.clientX - pos.x;
                    const dy = e.clientY - pos.y;

                    // Scroll the element
                    ele.scrollTop = pos.top - dy;
                    ele.scrollLeft = pos.left - dx;
                };

                const mouseUpHandler = function () {
                    ele.style.cursor = 'auto';

                    document.removeEventListener('mousemove', mouseMoveHandler);
                    document.removeEventListener('mouseup', mouseUpHandler);
                };

                // Attach the handler
                ele.addEventListener('mousedown', mouseDownHandler);
            });

*/


Dragging_table();
function Dragging_table(){
    

const slider = document.querySelector('.draggable-table');
let mouseDown = false;
let startX, scrollLeft;

let startDragging = function (e) {
  mouseDown = true;
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
   slider.style.cursor = 'move';
};
let stopDragging = function (event) {
  mouseDown = false;
 slider.style.cursor = 'auto';
};

slider.addEventListener('mousemove', (e) => {
  e.preventDefault();
  if(!mouseDown) { return; }
  const x = e.pageX - slider.offsetLeft;
  const scroll = x - startX;
  slider.scrollLeft = scrollLeft - scroll;
});

// Add the event listeners
slider.addEventListener('mousedown', startDragging, false);
slider.addEventListener('mouseup', stopDragging, false);
slider.addEventListener('mouseleave', stopDragging, false);
}

