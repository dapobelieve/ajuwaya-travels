<div class="header">    
      <nav class="navbar navbar-default main-navigation" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand logo" href="{{ route('home') }}"><img src="/aju/assets/img/logo.png" alt=""></a>
          </div>
          <!-- brand and toggle menu for mobile End -->

          <!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ route('home') }}"><i class="lnr lnr-home"></i> Home</a></li>
              @if(!Auth::check())
                <li><a href="{{ route('auth.login') }}"><i class="lnr lnr-enter"></i> Log in</a></li>
            @else
                <li><a href="{{ route('auth.signout') }}"><i class="lnr lnr-enter"></i> Log out</a></li>
            @endif
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>
    </div>