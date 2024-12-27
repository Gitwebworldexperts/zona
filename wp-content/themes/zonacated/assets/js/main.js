  
$('.program-sidebar .nav-tabs li a').click( function(){
    if ( $(this).hasClass('active') ) {
        $(this).removeClass('active');
    } else {
        $('.program-sidebar .nav-tabs li a.active').removeClass('active');
        $(this).addClass('active');    
    }
});
 (function ($) {

                $(".nav-btn.nav-slider").on("click", function () {
                    $(".overlay").show();
                    $(".sidebar").toggleClass("open");
                });

                $(".overlay").on("click", function () {
                    if ($(".sidebar").hasClass("open")) {
                        $(".sidebar").removeClass("open");
                    }
                    $(this).hide();
                });
                $(".overlay-body").on("click", function () {
                    if ($(".sidebar").hasClass("open")) {
                        $(".sidebar").removeClass("open");
                    }
                    $(this).hide();
                });

              
                
            })(jQuery);


 $(window).scroll(function() {
          var scroll = $(window).scrollTop();
          if (scroll >= 300) {
              $("header").addClass("darkHeader");
          } else {
              $("header").removeClass("darkHeader");
          }
         });
         
         
         $(window).scroll(function() {
         var scrollDeep = $(window).scrollTop();
         if (scrollDeep >= 500) {
         $("header").addClass("darkHeader-2");
         } else {
         $("header").removeClass("darkHeader-2");
         }
         });

		 
		 
		 
var owl = $('#instructor-slider');
                owl.owlCarousel({
                  margin: 0,
            items:1,
                  dots:false,
                  loop: true,
            nav:true,
            autoHeight: true,
                  responsive: {
                    0: {
                      dots:true,
                      items: 1
                    },
                    600: {
                      dots:true,
                      items: 1
                    },
                    1000: {
                      dots:true,
                      items: 2
                    }
                  }
                });
				


         var owl = $('#Testimonial-Slider');
                owl.owlCarousel({
                  margin: 0,
            items:1,
                  dots:true,
                  loop: true,
            nav:false,
            autoHeight: true,
                  responsive: {
                    0: {
                      dots:true,
                      items: 1
                    },
                    600: {
                      dots:true,
                      items: 1
                    },
                    1000: {
                      dots:true,
                      items: 1
                    }
                  }
                });			
				
				
new WOW().init();


document.addEventListener('DOMContentLoaded', function () {
    var menuItem = document.querySelector('.Mobile-megamenu');
    var dropdownMenu = menuItem.querySelector('.dropdown-menu');

    menuItem.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default anchor behavior
        
        // Toggle 'show' class
        dropdownMenu.classList.toggle('show');
    });

    // Optional: Close dropdown if clicking outside of it
    document.addEventListener('click', function (event) {
        if (!menuItem.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
});