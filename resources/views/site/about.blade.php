@extends('layoutsite.master')
@section('title')
Home
@endsection


@section('main-content')

<section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-2">
        <h2 class="title">About Us</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> About </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="w3l-cta4 py-5">
      <div class="container py-lg-5">
        <div class="ab-section text-center">
          <h6 class="sub-title">About Us</h6>
          <h3 class="hny-title">{!! $about->title !!}</h3>
          <p class="py-3 mb-3">{!! $about->description !!}</p>
            
        </div>
        <div class="row mt-5">
          <div class="col-md-9 mx-auto">
          @if($about->image)
            <img src="{{asset('assets/about/'.$about->image)}}" class="img-fluid" alt="">
            @else
            <img src="{{asset('site/assets/images/banner3.jpg')}}" class="img-fluid" alt="">
            @endif

          </div>
        </div>
      </div>
  </section>

  <section class="w3l-content-6 py-5">
    <div class="container py-lg-5">
      <div class="row">
        <div class="col-lg-6 content-6-left pr-lg-5">
          <h6 class="sub-title">Why Choose Us</h6>
          <h3 class="hny-title">{!! $about->s2_title !!}</h3>
        </div>
        <div class="col-lg-6 content-6-right mt-lg-0 mt-4">
          <p class="mb-3">{!! $about->s2_description !!}</p>
        </div>
      </div>
    </div>
</section>
<section class="w3l-statshny py-5" id="stats">
    <div class="container py-lg-5 py-md-4">
      <div class="w3-stats-inner-info">
        <div class="row">
          <div class="col-lg-4 col-6 stats_info counter_grid text-left">
            <span class="fa fa-smile-o"></span>
            <p class="counter">1730</p>
            <h4>Happy Customers</h4>
          </div>
          <div class="col-lg-4 col-6 stats_info counter_grid1 text-left">
            <span class="fa fa-users"></span>
            <p class="counter">730</p>
            <h4>Custom Products</h4>
          </div>
          <div class="col-lg-4 col-6 stats_info counter_grid mt-lg-0 mt-5 text-left">
            <span class="fa fa-database"></span>
            <p class="counter">30</p>
            <h4>branches</h4>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="w3l-team" id="team">
    <div class="team-block py-5">
      <div class="container py-lg-5">
        <div class="title-content text-center mb-lg-3 mb-4">
          <h6 class="sub-title">Our team</h6>
          <h3 class="hny-title">Meet our Guides</h3>
        </div>
        <div class="row">
        <div class="col-md-12 mt-lg-5 mt-4">
        <div id="members" class="owl-carousel owl-theme">
            @foreach ($team as $item)
          <div class="member">
            <div class="box16">
              <a href="#"><img src="{{asset('assets/team/'.$item->image)}}" alt="" class="img-fluid"></a>
              <div class="box-content">
                <h3 class="title"><a href="#url">{{$item->name}}</a></h3>
                <span class="post">{!! $item->description !!}</span>
                <ul class="social">
                  <li>
                    <a href="{{$item->fb_link}}" class="facebook">
                      <span class="fa fa-facebook-f"></span>
                    </a>
                  </li>
                  <li>
                    <a href="{{$item->twitter_link}}" class="twitter">
                      <span class="fa fa-twitter"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
         @endforeach
        </div>
      </div>
    </div>
  </section>


 

 




@endsection


@section('js')
<script>
    $(document).ready(function() {
    $("#members").owlCarousel({
    items: 4,
    autoplay: true,
    smartSpeed: 1000,
    margin:20,
    loop: true,
    autoplayHoverPause: true,
    responsive:{
 

      0:{
        items: 1
      },
 

      480:{
        items: 2
      },

      
       768:{
        items: 3
       },
       
      992:{
        items:4
      }
    }
  });
});
</script>
@endsection

