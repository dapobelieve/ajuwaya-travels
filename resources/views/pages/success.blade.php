@extends('layout.template')
@section('styles')
<link rel="stylesheet" href="/css/style.css">
    <script src="/tabstyle/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="/aju/assets/fonts/all.js"></script>
    <style>
        @media print {
            .noprint {
                display: none;
            }
        }
    </style>

@stop

@section('title')
  Success | AjuwayaTravel
@stop


@section('content')
   <section id="content">
      <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="print">
                    <div class="print-title">
                     <img class="print-img" src="/aju/assets/img/logo.png" alt=""> 
                        Booking Details</div>
                    <div class="print-content">
                        <ul>
                            <li>
                              <a> Name: <span class="details">{{ strtoupper($book->name)  }}</span> </a>
                            </li>
                            <li>
                              <a > Email: <span class="details">{{ $book->email }}</span> </a>
                            </li>
                            <li>
                              <a > Booking Reference: <span class="details">{{ $book->bk_ref }}</span> </a>
                            </li>
                            <li>
                              <a >Sex:   <span class="details">{{ strtoupper($book->gender) }}</span></a>
                            </li>
                            <li>
                              <a >Phone Number: <span class="details">{{ $book->phone }}</span></a>
                            </li>
                            <li>
                              <a >Selected Seat(s): <span class="details">{{ $book->seat }}</span></a>
                            </li>
                            <li>
                              <a >Amount Paid: <span class="details"> &#x20A6 {{ number_format($book->seat_num * $book->amount) }}</span></a>
                            </li>
                            <li>
                              <a >Location: <span class="details"> {{ $book->route->location->state }}</span></a>
                            </li>
                            <li>
                              <a >Destination: <span class="details"> {{ $book->route->camp->name }}, 
                                <small>{{ $book->route->camp->details }}</small> </span></a>
                            </li>
                            <li>
                              <a >Take off point: <span class="details"> {{ $book->route->take_off }}</span></a>
                            </li>
                            <li>
                              <a >Bus Type: <span class="details"> {{ $book->route->bus_type }} seater</span></a>
                            </li>
                            <li>
                              <a >Date: <span class="details"> {{ $book->route->takeoff->format('l, M j Y') }} </span></a>
                            </li>
                            <li>
                              <a >Time: <span class="details"> {{ $book->route->takeoff->format('g:i A') }} </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div style="text-align: center" class="noprint down">
                    <button onclick="window.print()"> Print </button>
                </div>
            </div>        
        </div>
      </div>
   </section>  
@stop
