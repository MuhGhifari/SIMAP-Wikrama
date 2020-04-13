<!DOCTYPE html>
<html>
<head>
	<title>SIMAP | Admin - @yield('title')</title>
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
        <a href="{{ route('admin.profile') }}" style="text-decoration: none; color: white;" title="Buka profil saya">
        	<div class="profile pt-4">   
        		<img class="avatar" src="/storage/user_avatar/{{ auth()->user()->avatar }}" class="profile">
            <h5 style="font-weight: lighter;" class="mb-2 mt-3">{{ ucfirst(Auth()->user()->name) }}</h5>
        		<div style="font-style: italic; " class="profile-name mb-3">{{ ucfirst(Auth()->user()->role) }}</div>
        	</div>
        </a>
      </div>
      <div class="list-group list-group-flush">
        <a href="{{ route('admin.siswa') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.siswa') ? 'active' : '' || Request::routeIs('admin.siswa.import') ? 'active' : '' }}">
          <i class="fas fa-fw fa-user-graduate mr-3"></i> Data Siswa
        </a>
        <a href="{{ route('admin.guru') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.guru') ? 'active' : '' }}">
          <i class="fas fa-fw fa-chalkboard-teacher mr-3"></i> Data Guru
        </a>
        <div class="borderless list-group-item {{ Request::routeIs('admin.rapot.*') ? 'active' : ''}} dropdown-btn">
          <i class="fas fa-fw fa-money-check mr-3"></i> Rapot Siswa
        </div>
        <div class="rapot-dropdown-container col-12 p-0 m-0"
          @if(Request::routeIs('admin.rapot.*'))
          style="display: block;"
          @else
          style="display: none;"
          @endif>
          <a href="{{ route('admin.rapot.kelas-10') }}" 
            class=" borderless dropdown-list {{ Request::routeIs('admin.rapot.kelas-10*') ? 'active' : '' }}">
            <i class="fa fa-chevron-right mr-3"></i> Kelas 10
          </a>
          <a href="{{ route('admin.rapot.kelas-11') }}" 
            class=" borderless dropdown-list {{ Request::routeIs('admin.rapot.kelas-11*') ? 'active' : '' }}">
            <i class="fa fa-chevron-right mr-3"></i> Kelas 11
          </a>
          <a href="{{ route('admin.rapot.kelas-12') }}" 
            class=" borderless dropdown-list {{ Request::routeIs('admin.rapot.kelas-12*') ? 'active' : '' }}">
            <i class="fa fa-chevron-right mr-3"></i> Kelas 12
          </a>
        </div>
        <a href="{{ route('admin.mapel') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.mapel') ? 'active' : '' }}">
          <i class="fas fa-fw fa-graduation-cap mr-3"></i> Mapel
        </a>
        <a href="{{ route('admin.rombel') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.rombel*') ? 'active' : '' }}">
          <i class="fas fa-fw fa-users mr-3"></i> Rombel
        </a>
        <a href="{{ route('admin.jurusan') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.jurusan') ? 'active' : '' }}">
          <i class="fas fa-fw fa-user-md mr-3"></i> Jurusan
        </a>
        <a href="{{ route('admin.rayon') }}" 
          class="borderless list-group-item {{ Request::routeIs('admin.rayon') ? 'active' : '' }}">
          <i class="fas fa-fw fa-map-marked-alt mr-3"></i> Rayon
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
</html>