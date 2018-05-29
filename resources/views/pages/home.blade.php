@extends('layout.template')

@section('title')

Welcome to AjuwayaTravels
@stop

@section('styles')
<link rel="stylesheet" href="/aju/assets/css/material-kit.css" type="text/css">
<link rel="stylesheet" href="/aju/assets/css/sweetalert.css" type="text/css">
 <script type="text/javascript" src="/aju/assets/fonts/all.js"></script>

@stop
@section('content')
        <!-- Start intro section -->
    <section id="intro" class="section-intro">
      <div class="overlay">
        <div class="container">
          <div class="main-text">
            <h1 class="intro-title">Welcome To <span style="color: #3498DB">Ajuwayatravels</span></h1>
            <p class="sub-title">Get easy transportation to states you've been posted to for service.</p>

            <!-- Start Search box -->
            <div class="row search-bar">
              <div class="advanced-search">
                <form class="search-form" action="{{ route('route.search') }}" method="get">
                  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select">
                        <select class="dropdown-product selectpicker" name="location" >
                          <option value="0">Select Location</option>
                          @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->state }}</option>
                          @endforeach

                        </select>                                    
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select location-select">
                        <select class="dropdown-product selectpicker" name="camp" >
                          <option value="0">Select Orientation Camp</option>
                          @foreach($camps as $camp)
                            <option value="{{ $camp->id }}">{{ ucwords($camp->name) }}</option>
                          @endforeach
                        </select>                                    
                      </label>
                    </div>


                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <button class="btn btn-common btn-search btn-block"><strong>Search</strong></button>
                  </div>
                </form>
              </div>
            </div>
            <!-- End Search box -->
          </div>
        </div>
      </div>
    </section>
    <!-- end intro section -->
    <section id="categories-homepage">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3 class="center section-title">Transportation in Easy Steps</h3>
            </div>          
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-1 wow fadeInUpQuick" data-wow-delay="0.3s">
                <div class="icon">
                  <a href="category.html"><i class="lnr lnr-magnifier color-1"></i></a>
                </div>
                <div class="category-header">  
                  <a href="category.html"><h4>Search</h4></a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-2 wow fadeInUpQuick" data-wow-delay="0.6s">
                <div class="icon">
                  <a href="category.html"><i class="lnr lnr-select color-2"></i></a>
                </div>
                <div class="category-header">  
                  <a href="category.html"><h4>Book</h4></a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-3 wow fadeInUpQuick" data-wow-delay="0.9s">
                <div class="icon">
                  <a href="category.html"><i class="lnr lnr-cloud-upload color-3"></i></a>
                </div>
                <div class="category-header">  
                  <a href="category.html"><h4>Pay</h4></a>
                </div>
              </div>
            </div>            
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-4 wow fadeInUpQuick" data-wow-delay="1.2s">
                <div class="icon">
                  <a href="category.html"><i class="lnr lnr-bus color-4"></i></a>
                </div>
                <div class="category-header">  
                  <a href="category.html"><h4>...</h4></a>
                </div>
                {{--  --}}
              </div>
            </div>
          </div>
        </div>
    </section>



    <section id="categories-homepage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="center section-title">Latest Routes</h3>
                </div>
                @foreach($routes as $route)
                <div class="adds-wrapper results">
                    <div class="item-list">
                        <div class="col-sm-8 add-desc-box">
                          <div class="add-details">
                            <h5 class="add-title"><a href="{{ route('book.start', ['route' => $route->ref]) }}">
                               <span class="take-off">{{ $route->location->state }}</span>  to 
                               <span class="dest">{{ $route->camp->toUp() }}</span>  </a></h5>
                            <div class="info">
                              <span class="add-type">{{ $route->camp->firstLetter() }}</span>
                              <span class="date takeoff">
                                <i class="fas fa-clock"></i>
                                {{-- Carbon::createFromTimestampUTC(strtotime($suber->ends_at)) --}}
                                {{ $route->takeoff->format('l jS \\of F Y h:i:s A') }}
                              </span> -
                              <span class="category takeoff">Takeoff point</span> -
                              <span class="item-location takeoff"><i class="fas fa-map-pin"></i> {{ $route->takeoff()}}</span>
                            </div>
                            <div class="item_desc">
                              <a href="#">Donec ut quam felis. Cras egestas, quam in plac erat dictum, erat mauris inte rdum est nec.</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4 price-box">
                          <h2 class="item-price pricy"> &#x20A6 {{ number_format($route->price) }} </h2>
                          <a
                            href="{{ route('route.details', ['route' => $route->ref]) }}"
                            class="btn btn-danger btn-sm">
                            <i class="fas fa-info-circle"></i>
                            <span>Details</span>
                        </a> 
                          <a 
                            href="{{ route('book.start', ['route' => $route->ref]) }}" 
                            class="btn btn-common center btn-sm"> 
                            <i class="fas fa-bus"></i> 
                            <span>Book</span> 
                        </a> 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div style="margin-bottom: 20px" class="center view-more">
                <a style="background-color: #f45" class="btn btn-common" href="{{ route('routes.more') }}">View More</a>
            </div>
        </div>
    </section>

@stop
@section('scripts')

<script type="text/javascript" src="/aju/assets/js/material.min.js"></script>
<script type="text/javascript" src="/aju/assets/js/material-kit.js"></script>
<script type="text/javascript" src="/aju/assets/js/jquery.parallax.js"></script>
<script type="text/javascript" src="/aju/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/aju/assets/js/wow.js"></script>
<script type="text/javascript" src="/aju/assets/js/main.js"></script>
<script type="text/javascript" src="/aju/assets/js/sweetalert.min.js"></script>
<script type="text/javascript">
     @if(Session::has('authMsg'))
      swal({
      title: "Alert",
      text: "{{ Session::get('authMsg')}}",
      type: 'warning'
    })
    @elseif(Session::has('success'))
      swal({
        title: "{{Session::get('title')}}",
        text:  "{{Session::get('success')}}",
        type: 'info'
      })
    @endif
</script>
@stop
