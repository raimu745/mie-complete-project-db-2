@extends('layoutsite.master')
@section('title')
Destination
@endsection


@section('main-content')

<section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">Destinations </h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Destinations </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="grids-1 py-5">
  <div class="grids py-lg-5 py-md-4">
      <div class="container">
          <h3 class="hny-title mb-5">Destinations</h3>
          <div class="row">


          @foreach($country as $item)
              <div class="col-lg-4 col-md-4 col-6">
              <?php 
                  $src = App\Models\CountryImage::where('country_id',$item->id)->latest()->first(); 
                  $intake = App\Models\CountryDes::where('country_id',$item->id)->latest()->first();
                  ?>
                  <div class="column">
                      <a href="{{route('country.detailsSite',['id'=>encrypt($item->id)])}}"><img src="{{asset('uploads/country/'.$src->image)}}" alt="" class="img-fluid"></a>
                      <div class="info">
                          <h4><a href="{{route('country.detailsSite',['id'=>encrypt($item->id)])}}">{{ ucwords($item->name)}}</a></h4>
                          <div class="dst-btm">
                            <h6 class="">Intake </h6>
                            <span>@if(isset($intake))
                      {{$intake->intake}}
                      @endif</span>
                          </div>
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

@endsection

