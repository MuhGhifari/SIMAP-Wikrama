<!DOCTYPE html>
<html>
<head>
	<title>SIMAP Guru - @yield('title')</title>
	@include('partials.stylesheets')
</head>
<body>
	@include('partials.nav')
	<div id="wrapper" class="d-flex">
		<div id="sidebar-wrapper">
      <div class="line text-center">
      	<div class="profile pt-4">
      		<img class="avatar" src="{{ asset('images/' . Auth()->user()->avatar)}}" class="profile">
      		<div class="profile-name mb-3 mt-3">{{ Auth()->user()->name }}</div>
      	</div>
      </div>
      <div class="list-group list-group-flush mt-3 ">
        <a href="#" class="borderless list-group-item  active">
        	<i class="fas fa-home mr-3"></i> Beranda
        </a>
        <a href="#" class="borderless list-group-item ">
        	<i class="fas fa-cloud-upload-alt mr-3"></i> Input Data
        </a>
        <a href="#" class="borderless list-group-item ">
        	<i class="fas fa-graduation-cap mr-3"></i> Nilai Siswa
        </a>
      </div>
    </div>
    <div id="page-content-wrapper">
   		<div class="container-fluid p-3">
   			@yield('content')
   		</div>
    </div>
	</div>
</body>
@include('partials.scripts')
<script src="js/bootstrap.min.js"></script>
</html>