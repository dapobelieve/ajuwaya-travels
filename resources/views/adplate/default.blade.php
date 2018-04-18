<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<title></title>
</head>
<body>
	{{-- @include('adplate.partials.nav') --}}
	<div class="container">
		@include('adplate.partials.alert')
		@yield('content')
	</div>

</body>
</html>