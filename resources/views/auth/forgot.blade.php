@extends('layout.template')
@section('styles')

<link rel="stylesheet" href="/aju/assets/css/sweetalert.css" type="text/css">
<style>
    .forgot {
        cursor: pointer;
    }
</style>

@stop
@section('content')

    <div class="page-header" style="background: url(/aju/assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">Reset Password</h2>
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
                Request Password Reset
              </h3>
              @if(Session::has('message'))
                <span>
                    {{ Session::get('message') }}
                </span>
              @endif
              <form method="post" action="#" role="form" class="login-form">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" required  id="sender-email" class="form-control" name="email" placeholder="Enter your Email Address">
                  </div>
                </div> 
                <button class="btn btn-common log-btn">Request reset</button>
                {{ csrf_field() }}
                    <span class="forgot">
                        <a href="{{ route('auth.login') }}">Login</a>
                    </span>
              </form>
              
              {{--  --}}
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
