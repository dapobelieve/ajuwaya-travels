@extends('layout.template')

@section('title')
Verfication Successful
@endsection

@section('content')

      <div class="container ">
        <img class="img-responsive" style="margin: 0 auto;" src="/aju/assets/img/emailVerify.png"  alt="verified">
        <div class=" text-center">
          <h1>Congratulations!!!</h1>
          <h3>
              Your Email has been verified successfully. <br>Continue <a href="{{route('home')}}">Here</a>
          </h3>
          
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
@stop