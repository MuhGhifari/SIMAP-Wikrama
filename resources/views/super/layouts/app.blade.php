<!DOCTYPE html>
<html>
<head>
	<title>SIMAP Guru - @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
	@include('partials.stylesheets')
</head>
<body style="background: url('{{ asset('images/company.jpg')  }}');
  background-size: cover;
  background-position: center;">
	@include('partials.nav')
	@yield('content')
</body>
@include('partials.scripts')
@yield('scripts')
</html>