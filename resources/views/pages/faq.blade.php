@extends('layout.template')

@section('title')

FAQ'S | AjuwayaTravels
@stop

@section('styles')
<link rel="stylesheet" href="/aju/assets/css/material-kit.css" type="text/css">
 <script type="text/javascript" src="/aju/assets/fonts/all.js"></script>

@stop


@section('content')
<div class="page-header" style="background: url(/aju/assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">Frequently Asked Questions</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="content">
      <div class="container">        
         <div class="row">
          <div class="col-md-12">
            <div class="head-faq text-center">
              <h2 class="section-title"></h2>
            </div>
            <!-- accordion start -->
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      How do I book? 
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <p>You can log on to our website on <a style="color: #3277bf; font-weight: bold" href="{{ route('home') }}">www.ajuwayatravel.com</a>  to register, book and print out your receipt.</p>
                    {{-- <br> --}}
                    <p>
                    You can also choose to visit either our head office at Mufsuf Motor Park, Ajegunle Bus-stop, Abeokuta Express Road or our branch at Mufsuf Motor Park Iyana Ipaja under bridge to book and get your receipt.</p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      Do you have POS?
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                     We don’t use POS at the moment.</p>                    
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                      I’m not close to Iyana Ipaja or Ajegunle Bus-stop . Can someone book for me?
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Yes.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                      Can I book on the take-off day?
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        No, we don’t do payment at departure. Endeavour to book before the day of 
                        departure.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                      Can I do a bank transfer or pay into your account?
                    </a>
                  </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                       No, but you can log on to our website on www.ajuwayatravels.com if you want to leverage on our online platform
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                      What kind of vehicles do you use?
                    </a>
                  </h4>
                </div>
                <div id="collapseSix" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                       We use hummer vehicles (the small buses with 15-passengers)
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                      Why is your departure schedule earlier?
                    </a>
                  </h4>
                </div>
                <div id="collapse7" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                       Our departure policy of 48 hours to camp for northern states and 24 hours to 
                        camp for eastern states and middle belt is for you to arrive early in camp and rest 
                        well at least for a night. This will make you psychologically ready for the stressful fun of camp activities. And this will make you register early first thing on the D-day.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                      Would we be allowed into camp before the date we are requested to report to camp?
                    </a>
                  </h4>
                </div>
                <div id="collapse8" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                        Yes, NYSC allows long-distance travellers inside camp a day before the official 
                        resumption. In fact, you will be given good bed space and sleep blissfully. Only that 
                        you won’t be served meals until the official resumption date.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                      Is it PCMs only?
                    </a>
                  </h4>
                </div>
                <div id="collapse10" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                       Yes
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">
                      Is it camp straight?
                    </a>
                  </h4>
                </div>
                <div id="collapse11" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                       Yes, we would take you in front of your camp gate.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">
                      How many persons per seat?
                    </a>
                  </h4>
                </div>
                <div id="collapse12" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                       One person per seat.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse13">
                      Do we pay extra amount for our luggage?
                    </a>
                  </h4>
                </div>
                <div id="collapse13" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                       No.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse14">
                      Are the vehicles Air-conditioned?
                    </a>
                  </h4>
                </div>
                <div id="collapse14" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                       Not all of them.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                      Are your drivers well-trained?
                    </a>
                  </h4>
                </div>
                <div id="collapse9" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                       Yes, our drivers are well-trained and cultured.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- accordion End -->    
          </div>      
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
