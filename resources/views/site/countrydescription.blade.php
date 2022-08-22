@extends('layoutsite.master')
@section('title')
countrydescription
@endsection
@section('main-content')

<section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-2">
        <h2 class="title">Country Description </h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Country Description </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="w3l-cta4 py-5" id="Work">
      <div class="container py-lg-5">
        <div class="ab-section text-center">
          <h6 class="sub-title"></h6>
          <h3 class="hny-title">{{ucwords($country_des->title)}}</h3>
          <p class="py-3 mb-3">{!! ucfirst($country_des->description) !!}</p>
        </div>
        <div class="row mt-5 no-gutters">
          
          

    <?php $img = App\Models\CountryImage::where('country_id',$country_des->country_id)->latest()->take(3)->get(); ?>  
    @foreach($img as $imgas)     
      <div class="col-md-3">  
      <div class="img-wrapper">
          <a href="{{asset('uploads/country/'.$imgas->image)}}">
            <img src="{{asset('uploads/country/'.$imgas->image)}}" class="img-responsive"  alt="" style="border-radius:none !important;">
          </a>
          </div>

      </div>
          @endforeach

        </div>
      </div>
  </section>
  <section class="w3l-grids1">
  <div class="hny-three-grids py-5">
  <div class="ab-section text-center">
          <h6 class="sub-title"></h6>
          <h3 class="hny-title">Related  Countries</h3>
        </div>
    <div class="container py-lg-5" >
    <div class="ab-section text-center">
          <h6 class="sub-title"></h6>
          <h3 class="hny-title"></h3>
        </div>
      <div class="row">
        <?php $country = App\Models\Country::where('id','!=',$country_des->id)->get(); ?>
        <div class="col-md-12 mt-0 grids5-info">
        <div id="members" class="owl-carousel owl-theme">
        @foreach($country as $item)
        <div class="member">
       
        <?php 
                  $src = App\Models\CountryImage::where('country_id',$item->id)->first(); 
                  $intake = App\Models\CountryDes::where('country_id',$item->id)->latest()->first();
                  ?>
          <a href="{{route('country.detailsSite',['id'=>encrypt($item->id)])}}"><img src="{{asset('uploads/country/'.$src->image)}}" class="img-fluid" alt=""></a>
          <h4><a href="#">{{ ucwords($item->name)}}</a></h4>
<p> Intake:  @if(isset($intake))
                      {{$intake->intake}}
                      @endif
                    </p>

        </div>
     @endforeach
        </div>
     </div>
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
    smartSpeed: 800,
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

$(function(){
	$("#Work").magnificPopup({

		
		delegate: 'a',
		type: 'image',
		
		gallery: {
			enabled: true,
		}
	});
});
</script>

@endsection

