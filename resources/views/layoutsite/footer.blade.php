<footer>
<!-- footer -->
<section class="w3l-footer">
  <div class="w3l-footer-16-main py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 column">
          <div class="row">
            <div class="col-md-6 column">
              <h3>Company</h3>
              <ul class="footer-gd-16">
                <li><a href="{{route('home.index')}}">Home</a></li>
                <li><a href="{{route('about_site.index')}}">About Us</a></li>
                <li><a href="{{route('destination.index')}}">Destination</a></li>
                <li><a href="{{route('contact_site.index')}}">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-md-6 column mt-md-0 mt-4">
              <h3>Useful Links</h3>
              <ul class="footer-gd-16">
                <li><a href="{{route('destination.index')}}">Destinations</a></li>
                <li><a href="#">Our Branches</a></li>
                <li><a href="{{route('about_site.index')}}">About Us</a></li>
                <li><a href="#">Our Packages</a></li>
              </ul>
            </div>
           
          </div>
        </div>
        <div class="col-lg-6 col-md-12 column pl-lg-5 column4 mt-lg-0 mt-5">
          <h3>Newsletter </h3>
          <div class="end-column">
            <h4>Get latest updates and offers.</h4>
            <form action="#" class="subscribe" method="post">
              <input type="email" name="email" placeholder="Email Address" required="">
              <button type="submit">Go</button>
            </form>
            <p>Sign up for our latest news & articles. We won’t give you spam mails.</p>
          </div>
        </div>
      </div>
      <div class="d-flex below-section justify-content-between align-items-center pt-4 mt-5">
        <div class="columns text-lg-left text-center">
          <p>&copy; @php echo date('Y'); @endphp MIE Consultant. All rights reserved.Design by <a href="" target="_blank">
            PeerBrothers</a>
          </p>
        </div>
        <div class="columns-2 mt-lg-0 mt-3">
          <ul class="social">
            <?php $fb = App\Models\Setting::find('1'); ?>
            <li><a href="{{$fb->facebook_link}}"><span class="fa fa-facebook" aria-hidden="true"></span></a>
            </li>
            <!-- <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a> -->
           
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- move top -->
  <button onclick="topFunction()" id="movetop" title="Go to top">
    <span class="fa fa-angle-up"></span>
  </button>
  <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
      } else {
        document.getElementById("movetop").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- //move top -->
  <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
</section>
<!-- //footer -->
</footer>