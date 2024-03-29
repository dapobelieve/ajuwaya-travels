@extends('layout.template')
@section('styles')

    {{-- <link rel="stylesheet" type="text/css" href="/tabstyle/css/normalize.css" /> --}}
    <link rel="stylesheet" type="text/css" href="/tabstyle/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="/tabstyle/css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="/tabstyle/css/tabstyles.css" />
    <script src="/tabstyle/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="/aju/assets/fonts/all.js"></script>

    <script>
        window.ajt_model = "{{ $model }}";
        window.currUser  = {{ Auth::user()->id }};
    </script>


@stop

@section('title')
Booking | AjuwayaTravels
@stop


@section('content')
    
    {{-- <div id="mute" class="on"></div> --}}
    <div style="padding: 0.9rem" id="app">

        <router-view name="bookBus"></router-view>
        <router-view></router-view>
        {{-- <booker></booker> --}}
        
        
    </div>
        
@stop

@section('scripts')
<script src="{{asset('js/app.js') }}"></script>
<script src="/tabstyle/js/cbpFWTabs.js"></script>
<script>
    (function() {

        [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
            new CBPFWTabs( el );
        });

    })();


</script>



@stop
