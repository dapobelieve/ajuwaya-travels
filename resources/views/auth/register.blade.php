@extends('layout.template')
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
          <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                Register
              </h3>
              @if(count($errors) > 0)
                    <strong>Error alert:</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li style="color:red"> * {{ $error }} </li>
                            @endforeach
                        </ul>
              @endif
              <form role="form" action="{{ route('auth.register') }}" method="post" class="login-form">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input type="text" value="{{ Request::old('email') ?: ''}}" class="form-control" name="email" placeholder="Email Address">
                    @if($errors->has('email'))
                    <span class="help-block formlert">
                        {{$errors->first('email')}}
                    </span>
                  @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('fname') ? ' has-error' : ''}}">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                <div class="form-group{{ $errors->has('fname') ? ' has-error' : ''}}">
                    <input type="text" value="{{ Request::old('fname') ?: ''}}" value="{{ Request::old('fname') ?: ''}}" class="form-control" name="fname" placeholder="Full Name">
                    @if($errors->has('fname'))
                    <span class="help-block formlert">
                        {{$errors->first('fname')}}
                    </span>
                  @endif
                  </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : ''}}">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    @if($errors->has('password'))
                        <span class="help-block formlert">
                            {{$errors->first('password')}}
                        </span>
                  @endif
                  </div>
                </div>  
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : ''}}">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password">
                  </div>
                </div>                 
                {{-- <div class="checkbox">
                  <input type="checkbox" id="remember" name="remember"  style="float: left;">
                  <label for="remember">By creating account you agree to our Terms & Conditions</label>
                </div> --}}
                <button class="btn btn-common log-btn type="submit ">Register</button>
                {{ csrf_field() }}
                <a style="text-transform: none; border-radius: 2px" class="btn btn-xs  btn-social btn-google">
                    <span class="fa fa-google"></span> Sign up with Google
                </a>
                <a style="text-transform: none; border-radius: 2px" class="btn btn-xs  btn-social btn-facebook">
                    <span class="fa fa-facebook"></span> Sign up with Facebook
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End -->

@stop