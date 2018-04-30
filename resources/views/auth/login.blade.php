@extends('layout.template')
@section('styles')

<link rel="stylesheet" href="/aju/assets/css/sweetalert.css" type="text/css">

@stop
@section('content')

    <div class="page-header" style="background: url(/aju/assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">Join Us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Content section Start --> 
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                Login
              </h3>
              <form method="post" action="{{ route('auth.login') }}" role="form" class="login-form">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" value="{{ Request::old('email') ?: ''}}" id="sender-email" class="form-control" name="email" placeholder="Email Address">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                </div>                  
                <div class="checkbox">
                  <input type="checkbox" id="remember" name="rememberme" value="forever" style="float: left;">
                  <label for="remember">Remember me</label>
                </div>
                <button class="btn btn-common log-btn">Submit</button>
                {{ csrf_field() }}
                    <a href="/redirect/google" style="text-transform: none; border-radius: 2px" class="btn btn-xs  btn-social btn-google">
                        <span class="fa fa-google"></span> Sign up with Google
                    </a>
                    {{-- <a href="/redirect/facebook" style="text-transform: none; border-radius: 2px" class="btn btn-xs  btn-social btn-facebook">
                        <span class="fa fa-facebook"></span> Sign up with Facebook
                    </a>  --}}   
              </form>
              
              <ul class="form-links">
                <li class="pull-left"><a href="{{ route('auth.register') }}">Create Account</a></li>
                <li class="pull-right"><a href="#">{{-- Lost your password? --}}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End -->

@stop
@section('scripts')
<script type="text/javascript" src="/aju/assets/js/sweetalert.min.js"></script>
<script type="text/javascript">
     @if(Session::has('authMsg'))
      swal({
      title: "Alert",
      text: "{{ Session::get('authMsg')}}",
      type: 'info'
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
