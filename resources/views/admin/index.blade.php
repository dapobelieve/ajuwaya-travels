<!DOCTYPE html>
<html lang="en">

<head>
        <title>Dashboard</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/authmin/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/authmin/css/font-awesome.css" />
        <link rel="stylesheet" href="/authmin/css/fullcalendar.css" />
        <link rel="stylesheet" href="/authmin/css/jquery.jscrollpane.css" /> 
        <link rel="stylesheet" href="/authmin/css/unicorn.css" />
        @yield('admin-style')
       
   
    </head>    
    <body data-color="grey" class="flat">
        <div id="wrapper">
            <div id="header">
                <h1><a href="#">Admin</a></h1>   
                <a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>    
            </div>
        
            <div id="user-nav">
                <ul class="btn-group">
                    <li class="btn"><a title="" href="{{ route('home') }}"><i class="fa fa-share"></i> <span class="text">Go to site</span></a></li>
                </ul>
            </div>
           
          
            @include('admin.template.nav')

            <div id="content">
                    <div id="content-header" class="mini">
                        <h1>@yield('big-name')</h1>
                    </div>
                    <div id="breadcrumb">
                        <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
                        <a href="#" class="current">Dashboard</a>
                    </div>
                    <div class="container-fluid">
                            {{-- @yield('admin-tabs') --}}
                        @yield('admin-content')                  
                    </div>
                {{-- </div> --}}
                <div class="row">
                    <div id="footer" class="col-xs-12">
                        2017 &copy;  Brought to you by <a href="facebook.com/dapobelieve">Believe</a>
                    </div>
                </div>
            </div>

            <script src="/authmin/js/jquery.min.js"></script>
            <script src="/authmin/js/jquery-ui.custom.js"></script>
            <script src="/authmin/js/bootstrap.min.js"></script>
            <script src="/authmin/js/jquery.nicescroll.min.js"></script>
            <script src="/authmin/js/unicorn.js"></script>
            @yield('admin-scripts')
    </body>

</html>
