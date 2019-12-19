<!DOCTYPE html>
<html>
<head>
	<title>SIMAP | Admin - @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
	@include('partials.stylesheets')
  @yield('stylesheets')
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
      <div class="list-group list-group-flush mt-3">
        <a href="{{ route('admin.index') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.index') ? 'active' : '' }}">
        	<i class="fas fa-fw fa-home mr-3"></i> Beranda
        </a>
        <a href="{{ route('admin.siswa') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.siswa') ? 'active' : '' || Request::routeIs('admin.siswa.import') ? 'active' : '' }}">
          <i class="fas fa-fw fa-user-graduate mr-3"></i> Data Siswa
        </a>
        <a href="{{ route('admin.rapot') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.rapot') ? 'active' : '' }}">
          <i class="fas fa-fw fa-graduation-cap mr-3"></i> Rapot Siswa
        </a>
        <a href="{{ route('admin.guru') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.guru') ? 'active' : '' }}">
          <i class="fas fa-fw fa-chalkboard-teacher mr-3"></i> Data Guru
        </a>
        <a href="{{ route('admin.rombel') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.rombel') ? 'active' : '' }}">
          <i class="fas fa-fw fa-book-reader mr-3"></i> Rombel
        </a>
        <a href="{{ route('admin.jurusan') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.jurusan') ? 'active' : '' }}">
          <i class="fas fa-fw fa-book-reader mr-3"></i> Jurusan
        </a>
        <a href="{{ route('admin.rayon') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.rayon') ? 'active' : '' }}">
          <i class="fas fa-fw fa-book-reader mr-3"></i> Rayon
        </a>
      </div>
    </div>
    <div id="page-content-wrapper">
   		<div class="container-fluid p-3">
   			@yield('content')
   		</div>
    </div>
	</div>
  @include('partials.loader')
</body>
@include('partials.scripts')
@yield('scripts')
</script>
</html>