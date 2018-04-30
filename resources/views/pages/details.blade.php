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
    <div id="content">
      <div class="container">
        <div class="row">
          <!-- Product Info Start -->
          <div class="product-info">
            <div class="col-sm-8">
              <div class="inner-box ads-details-wrapper">
                    <h2>{{ $route->location->state }} to <span class="dest">{{ $route->camp->toUp() }}</span></h2>
                    <p class="item-intro">
                    <span class="poster">
                        {{-- <span class="ui-bubble is-member">MEMBER</span>  --}}
                        <span class="depart">
                            <i class="fas fa-clock"></i>
                            {{ $route->takeoff->format('l jS \\of F Y h:i:s A') }}</span>  
                        {{-- <span class="location">New York</span></p> --}}
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            <div class="item">
                              {{-- <img src="aju/assets/img/productinfo/img1.jpg" alt=""> --}}
                            </div>
                            <div class="item">
                              {{-- <img src="aju/assets/img/productinfo/img2.jpg" alt=""> --}}
                            </div>
                            <div class="item">
                              {{-- <img src="aju/assets/img/productinfo/img3.jpg" alt=""> --}}
                            </div>
                        </div>
              </div>

              <div class="Ads-Details">
                    <h4 class=""><strong>Details</strong></h4>
                    <div class="row">
                      <div class="ads-details-info col-md-8">
                        {{-- <p>Powerful dual-core and quad-core Intel processors, more advanced graphics, faster PCIe-based flash storage, superfast memory, and Thunderbolt 2, MacBook Pro with Retina display delivers all the performance you want from a notebook.</p> --}}
                        <ul class="list-circle">
                          <li><i class="fas fa-bus"></i>  Bus Type: <strong> {{ $route->bus_type }} </strong> seater bus.</li>
                          <li><i class="fas fa-map-pin"></i> Take off point: <strong> {{ $route->take_off }} </strong> </li>
                          <li><i class="fas fa-money"></i> Price: <strong> &#x20A6 {{ number_format($route->price) }} </strong> </li>
                          <li><i class="fas fa-clock"></i> Time: <strong> {{ $route->takeoff->format('l jS \\of F Y h:i:s A') }} </strong> </li>
                      </ul>
                      </div>
                      <div class="col-md-4">
                        <div class="ads-action">
                          <ul class="list-border">
                            <li>
                              <a href="#"> <i class=" fa fa-phone"></i> 022445167532 </a> </li>
                            <li>
                          </ul>
                        </div>
                      </div>
                    </div>
              </div>
            <div class="book-btn center">
                <a 
                    href="{{ route('book.start', ['route' => $route->ref]) }}" 
                    class="btn btn-common details-book btn-lg"> 
                    <i class="fas fa-bus"></i> 
                    <span>Book Now</span> 
                </a>                
            </div>
                
            </div>
            <div class="col-sm-4">
              <div class="inner-box">
                <div class="widget-title">
                  <h4>Advertisement</h4>
                </div>
                <img src="assets/img/img1.jpg" alt="">
              </div>
            </div>
            <div class="col-sm-4 col-xs-12">
              <div class="inner-box">
              </div>
            </div>
          </div>
          <!-- Product Info End -->
        </div>
      </div>         
    </div>

@stop
@section('scripts')

<script type="text/javascript" src="/aju/assets/js/material.min.js"></script>
<script type="text/javascript" src="/aju/assets/js/material-kit.js"></script>
<script type="text/javascript" src="/aju/assets/js/jquery.parallax.js"></script>
<script type="text/javascript" src="/aju/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/aju/assets/js/wow.js"></script>
<script type="text/javascript" src="/aju/assets/js/main.js"></script>
@stop
