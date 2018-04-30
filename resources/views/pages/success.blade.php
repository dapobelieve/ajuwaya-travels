@extends('layout.template')
@section('styles')

    {{-- <link rel="stylesheet" type="text/css" href="/tabstyle/css/normalize.css" /> --}}
    <link rel="stylesheet" type="text/css" href="/tabstyle/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="/tabstyle/css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="/tabstyle/css/tabstyles.css" />
    <script src="/tabstyle/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="/aju/assets/fonts/all.js"></script>

@stop

@section('title')
Success | AjuwayaTravel
@stop


@section('content')
    
   <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           <div class="inner-box posting">
              <div class="alert alert-success alert-lg" role="alert">
              <h2 class="postin-title center">✔ Congratulations!<br>
               Your booking was successful.<br> Check your mail for booking details. </p>
              <p><a style="color: #fff" href="{{ route('home') }}">Home</a> </p>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
        
@stop

@section('scripts')
<script src="/tabstyle/js/cbpFWTabs.js"></script>




@stop
