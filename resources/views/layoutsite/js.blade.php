  <script src="{{asset('site/assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('site/assets/js/theme-change.js')}}"></script>
  <!--/slider-js-->
  <script src="{{asset('site/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('site/assets/js/modernizr-2.6.2.min.js')}}"></script>
  <script src="{{asset('site/assets/js/jquery.zoomslider.min.js')}}"></script>
  <!--//slider-js-->
  
  <script src="{{asset('assets/js/popup.js')}}"></script>
  <script src="{{asset('site/assets/owl-car/owl.carousel.min.js')}}"></script>
  <script src="{{asset('site/assets/magnific-pop/jquery.magnific-popup.min.js')}}"></script>
  
  <!-- script for tesimonials carousel slider -->
  <script>
    $(document).ready(function () {
      $("#owl-demo1").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        autoplay: true,
        autoPlaySpeed: 5000,
        autoPlayTimeout: 5000,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          736: {
            items: 1,
            nav: false
          },
          1000: {
            items: 1,
            nav: false,
            loop: true
          }
        }
      })
    })
  </script>
  <!-- //script for tesimonials carousel slider -->
  <!-- stats number counter-->
  <script src="{{asset('site/assets/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('site/assets/js/jquery.countup.js')}}"></script>
  <script>
    $('.counter').countUp();
  </script>
  <!-- //stats number counter -->

  <!--/MENU-JS-->
  <script>
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 80) {
        $("#site-header").addClass("nav-fixed");
      } else {
        $("#site-header").removeClass("nav-fixed");
      }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
      $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
      $(window).on("resize", function () {
        if ($(window).width() > 991) {
          $("header").removeClass("active");
        }
      });
    });
  </script>
  <!--//MENU-JS-->

  <script src="{{asset('site/assets/js/bootstrap.min.js')}}"></script>