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
    <section id="categories-homepage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Search Results</h3>
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
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
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
