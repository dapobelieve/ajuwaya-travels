@extends('layout.template')
@section('styles')

    <link rel="stylesheet" type="text/css" href="/tabstyle/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/tabstyle/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="/tabstyle/css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="/tabstyle/css/tabstyles.css" />
    <script src="/tabstyle/js/modernizr.custom.js"></script>


@stop
@section('content')
    <div id="app">
        {{-- <section>
            <div class="tabs tabs-style-bar">
                <nav>
                    <ul>
                        <li><a href="#section-bar-1" class="icon icon-edit active"><span>Home</span></a></li>
                        <li><a href="#section-bar-2" class="icon icon-box"><span>Archive</span></a></li>
                        <li><a href="#section-bar-3" class="icon icon-display"><span>Analytics</span></a></li>
                        <li><a href="#section-bar-4" class="icon icon-upload"><span>Upload</span></a></li>
                        <li><a href="#section-bar-5" class="icon icon-tools"><span>Settings</span></a></li>
                    </ul>
                </nav>
                <div class="content-wrap">
                    <section id="section-bar-1"><p>1</p></section>
                    <section id="section-bar-2"><p>2</p></section>
                    <section id="section-bar-3"><p>3</p></section>
                    <section id="section-bar-4"><p>4</p></section>
                    <section id="section-bar-5"><p>5</p></section>
                </div><!-- /content -->
            </div><!-- /tabs -->     
        </section> --}}
        <router-view name="bookBus"></router-view>
        <router-view></router-view>
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
