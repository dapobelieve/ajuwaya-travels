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
                Reset Password 
              </h3>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <form method="post" action="{{ route('pass.reset') }}" role="form" class="login-form">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="password" required  id="sender-email" class="form-control" name="password" placeholder="Enter your New Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="password" required  id="sender-email" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                  </div>
                </div> 
                <button class="btn btn-common log-btn">Request reset</button>
                {{ csrf_field() }}
                <input type="hidden" name="usermail" value="{{ $email }}">
                    {{-- <span class="forgot">
                        <a href="{{ route('auth.login') }}">Login</a>
                    </span> --}}
              </form>
              
              {{--  --}}
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End -->

@stop

