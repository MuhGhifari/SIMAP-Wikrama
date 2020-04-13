<!DOCTYPE html>
<html>
<head>
	<title>SIMAP Guru - @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
	@include('partials.stylesheets')
  @yield('links')
  @yield('stylesheets')
</head>
<body>
	@include('partials.nav')
	<div id="wrapper" class="d-flex">
		<div id="sidebar-wrapper">
      <div class="line text-center">
        <a href="{{ route('guru.profile') }}" style="text-decoration: none; color: white;" title="Buka profile saya">
        	<div class="profile pt-4">
        		  <img class="avatar" src="/storage/user_avatar/{{ auth()->user()->avatar }}" class="profile">
            <div class="name p-2">
          		<h5 style="font-weight: lighter;" class="mb-2 mt-3">{{ ucfirst(Auth()->user()->name) }}</h5>
              <div style="font-style: italic; " class="profile-name mb-3">{{ ucfirst(Auth()->user()->guru->mapel->nama)}}</div>
            </div>
        	</div>
        </a>
      </div>
      <div class="list-group list-group-flush mt-3 ">
        <a href="{{ route('guru.index') }}" class="borderless list-group-item  {{ Request::routeIs('guru.index*') ? 'active' : '' }}">
        	<i class="fas fa-home mr-3"></i> Beranda
        </a>
        <div class="borderless list-group-item {{ Request::routeIs('guru.nilai*') ? 'active' : '' }} dropdown-btn">
        	<i class="fas fa-graduation-cap mr-3"></i> Nilai Siswa
        </div>
        <div class="nilai-dropdown-container col-12 p-0 m-0"
          @if(Request::routeIs('guru.nilai*'))
          style="display: block;"
          @else
          style="display: none;"
          @endif>
          <a href="{{ route('guru.nilai.uts-ganjil') }}" 
            class=" borderless dropdown-list {{ Request::routeIs('guru.nilai.uts-ganjil*') ? 'active' : '' }}">
            <i class="fa fa-chevron-right mr-3"></i> UTS Semester 1
          </a>
          <a href="{{ route('guru.nilai.uas-ganjil') }}" 
            class=" borderless dropdown-list {{ Request::routeIs('guru.nilai.uas-ganjil*') ? 'active' : '' }}">
            <i class="fa fa-chevron-right mr-3"></i> UAS Semester 1
          </a>
          <a href="{{ route('guru.nilai.uts-genap') }}" 
            class=" borderless dropdown-list {{ Request::routeIs('guru.nilai.uts-genap*') ? 'active' : '' }}">
            <i class="fa fa-chevron-right mr-3"></i> UTS Semester 2
          </a>
          <a href="{{ route('guru.nilai.uas-genap') }}" 
            class=" borderless dropdown-list {{ Request::routeIs('guru.nilai.uas-genap*') ? 'active' : '' }}">
            <i class="fa fa-chevron-right mr-3"></i> UAS Semester 2
          </a>
        </div>
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
@yield('scripts')
</html>