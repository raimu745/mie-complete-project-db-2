@extends('layoutsite.master')
@section('title')
Home
@endsection


@section('main-content')
<style>
    .demo-1{
        position: relative;
    overflow: hidden;
    width: 100%;
    background-color: #999;
    min-height: 640px;
    display: grid;
    align-items: center;
    }
</style>
 <!-- main-slider -->
 <section class="w3l-main-slider" id="home">
    <div class="banner-content">
      <div class="demo-1"
        data-zs-src='["{{asset("assets/uploads/slider/$s1")}}","{{asset("assets/uploads/slider/$s2")}}","{{asset("assets/uploads/slider/$s3")}}","{{asset("assets/uploads/slider/$s4")}}"]'
        data-zs-overlay="dots">
        <div class="demo-inner-content">
          <div class="container">
            <div class="banner-infhny">
              <h3>You don't need to go far to find what matters.</h3>
              <h6 class="mb-3">Discover your next adventure</h6>
              <div class="flex-wrap search-wthree-field mt-md-5 mt-4">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /main-slider -->
  <!-- //banner-slider-->

  <!--/grids-->
  <section class="w3l-grids-3 py-5">
    <div class="container py-md-5">
      <div class="title-content text-left mb-lg-5 mb-4">
        <h6 class="sub-title">Visit</h6>
        <h3 class="hny-title">Popular Destinations</h3>
      </div>
      
  <!--/row-grids-->
      @foreach($country->chunk(2) as $items)
      <div class="row bottom-ab-grids">
      @foreach($items as $item)
        <div class="col-lg-6 subject-card mt-lg-0 mt-4" style="margin-bottom:12px ;
        ">
          <div class="subject-card-header p-4">
            <a href="{{route('country.detailsSite',['id'=>encrypt($item->id)])}}" class="card_title p-lg-4d-block">
              <div class="row align-items-center">
                <div class="col-sm-5 subject-img">
                  <?php 
                  $src = App\Models\CountryImage::where('country_id',$item->id)->first(); 
                  $intake = App\Models\CountryDes::where('country_id',$item->id)->latest()->first();
                  ?>
                  @if(isset($src))
                  <img src="{{asset('uploads/country/'.$src->image)}}" class="img-fluid" alt="">
                  @else
                  <img src="https://crm.scholarseries.com/public/img/80.png" class="img-fluid" alt="">

                  @endif
                </div>
                <div class="col-sm-7 subject-content mt-sm-0 mt-4">
                  <h4>{{ucwords($item->name)}}</h4>
                  
                  <div class="dst-btm">
                    <h6 class=""> Intake </h6>
                    <span>
                      @if(isset($intake))
                      {{$intake->intake}}
                      @endif
                    </span>
                  </div>
                  <p class="sub-para">
                  @if(isset($intake))
  
                  {{ucwords($intake->title)}}
                 @endif
                </p>
                </div>
              </div>
            </a>
          </div>
        </div>
       @endforeach
        </div>

        @endforeach
          <!--//row-grids-->
            <!--/row-grids-->
        
    </div>
  </section>
  <!--//grids-->


  <section class="w3l-stats py-5" id="stats">
    <div class="gallery-inner container py-lg-0 py-3">
      <div class="row stats-con pb-lg-3">
        <div class="col-lg-3 col-6 stats_info counter_grid">
          <p class="counter">730</p>
          <h4>Branches</h4>
        </div>
        <div class="col-lg-3 col-6 stats_info counter_grid1">
          <p class="counter">1680</p>
          <h4>Travel Guides</h4>
        </div>
        <div class="col-lg-3 col-6 stats_info counter_grid mt-lg-0 mt-5">
          <p class="counter">812</p>
          <h4>Happy Customers</h4>
        </div>
        <div class="col-lg-3 col-6 stats_info counter_grid2 mt-lg-0 mt-5">
          <p class="counter">990</p>
          <h4>Awards</h4>
        </div>
      </div>
    </div>
  </section>
  <!-- //stats -->

  <section class="w3l-bottom py-5">
    <div class="container py-md-4 py-3 text-center">
      <div class="row my-lg-4 mt-4">
        <div class="col-lg-9 col-md-10 ml-auto">
          <div class="bottom-info ml-auto">
            <div class="header-section text-left">
              <h3 class="hny-title two">Traveling makes a man wiser, but less happy.</h3>
              <p class="mt-3 pr-lg-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
                voluptate rem ullam dolore nisi voluptatibus esse quasi. Integer sit amet .Lorem ipsum dolor sit
                amet adipisicing elit.</p>
              <a href="#" class="btn btn-style btn-secondary mt-5">Read More</a>
            </div>
           

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--//w3l-bottom-->
  <!-- testimonials -->
  <section class="w3l-clients" id="clients">
    <!-- /grids -->
    <div class="cusrtomer-layout py-5">
      <div class="container py-lg-4 py-md-3 pb-lg-0">
        <div class="heading text-center mx-auto">
          <h6 class="sub-title text-center">Here’s what they have to say</h6>
          <h3 class="hny-title mb-md-5 mb-4">our clients do the talking</h3>
        </div>
        <!-- /grids -->
        <div class="testimonial-width">
          <div id="owl-demo1" class="owl-two owl-carousel owl-theme">
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <blockquote>
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
                    voluptate rem ullam dolore nisi voluptatibus esse quasi. Integer sit amet .Lorem ipsum dolor sit
                    amet adipisicing elit. Laborum dolor facere ipsum adipisicingelit.
                  </blockquote>
                  <div class="testi-des">
                    <div class="test-img"><img src="{{asset('site/assets/images/c1.jpg')}}" class="img-fluid" alt="client-img">
                    </div>
                    <div class="peopl align-self">
                      <h3>Rohit Paul</h3>
                      <p class="indentity">Example City</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <blockquote>
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
                    voluptate rem ullam dolore nisi voluptatibus esse quasi. Integer sit amet .Lorem ipsum dolor sit
                    amet adipisicing elit. Laborum dolor facere ipsum adipisicingelit.
                  </blockquote>
                  <div class="testi-des">
                    <div class="test-img"><img src="{{asset('site/assets/images/c2.jpg')}}" class="img-fluid" alt="client-img">
                    </div>
                    <div class="peopl align-self">
                      <h3>Shveta</h3>
                      <p class="indentity">Example City</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <blockquote>
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
                    voluptate rem ullam dolore nisi voluptatibus esse quasi. Integer sit amet .Lorem ipsum dolor sit
                    amet adipisicing elit. Laborum dolor facere ipsum adipisicingelit.
                  </blockquote>
                  <div class="testi-des">
                    <div class="test-img"><img src="{{asset('site/assets/images/c3.jpg')}}" class="img-fluid" alt="client-img">
                    </div>
                    <div class="peopl align-self">
                      <h3>Roy Linderson</h3>
                      <p class="indentity">Example City</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-content">
                <div class="testimonial">
                  <blockquote>
                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
                    voluptate rem ullam dolore nisi voluptatibus esse quasi. Integer sit amet .Lorem ipsum dolor sit
                    amet adipisicing elit. Laborum dolor facere ipsum adipisicingelit.
                  </blockquote>
                  <div class="testi-des">
                    <div class="test-img"><img src="{{asset('site/assets/images/c4.jpg')}}" class="img-fluid" alt="client-img">
                    </div>
                    <div class="peopl align-self">
                      <h3>Mike Thyson</h3>
                      <p class="indentity">Example City</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <!-- /grids -->
    </div>
    <!-- //grids -->
  </section>
  <!-- //testimonials -->



@endsection


@section('js')

@endsection

