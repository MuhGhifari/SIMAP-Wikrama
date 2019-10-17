<!DOCTYPE html>
<html>
<head>
	<title>tes</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/signin.css') }}">
	<script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
	<style type="text/css">
		.bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
	</style>
</head>
<body class="text-center">
	<form class="form-signin" method="POST" action="{{ route('login') }}">
		<img class="mb-4" src="{{ asset('images/logo_wikrama.png') }}" alt="" width="72" height="72">
	  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
	  <label for="username" class="sr-only">Username</label>
	  <input type="text" id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" placeholder="Username" required autofocus>
	  @if ($errors->has('username'))
	  	<span class="invalid-feedback" role="alert">
	  		<strong>{{ $errors->first('username') }}</strong>
	  	</span>
	  @endif
	  <label for="password" class="sr-only">Password</label>
	  <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
	  @error('password')
	  	<span class="invalid-feedback" role="alert">
	  		<strong>{{ $message }}</strong>
	  	</span>
	  @enderror
	  <div class="checkbox mb-3">
	    <label>
	      <input class="form-check-input" type="checkbox" name="remember" id="remember" value= "{{ old('remember') ? 'checked' : '' }}"> Remember me
	    </label>
	  </div>
	  <button type="submit" class="btn btn-lg btn-primary btn-block">{{ __('Sign in') }}</button>
	  @if (Route::has('password.request'))
	  	<a class="btn btn-link" href="{{ route('password.request') }}">
	  		{{ __('Forgot Your Password?') }}
	  	</a>
	  @endif
	  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
	</form>
</body>
</html>