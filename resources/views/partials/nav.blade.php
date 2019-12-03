  <nav class="navbar navbar-expand navbar-light shadow p-0">
    <div class="brand"><img src="{{ asset('images/logo_kuning_wikrama.png')}}"></div>
    <div class="simap" id="title">SIMAP Guru</div>
    <div style="position: absolute; right: 0;" class="mr-4">
      <a class="logout mb-2" href="{{ route('logout') }}" 
        onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
        <div class="logout-btn"><i class="fas fa-sign-out-alt mr-1"></i> Logout</div>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </nav>  