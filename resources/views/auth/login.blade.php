<html>
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		@include('partials.stylesheets')
		<style type="text/css">
			#login, #password{
			  font-size: 20px;
			  margin: auto;  
			  height: 50px;
			  border-radius: 30px;
			  max-width: 60%;
			}
		</style>
	</head>
	<body>
		<div class="row m-0" id="main">
			<div class="banner col-md-6" data-slideshow>
				<img src="images/semangat_unbk.jpg">
				<img src="images/jumat_mubarok.jpg">
				<img src="images/belajar.jpg">
				<img src="images/selamat_siang.jpg">
			</div>
			<div class="form-group col-md-6 pt-4 text-center" id="form">
				<div class="text-center pt-5">
					<img src="{{ asset('images/logo_wikrama.png')}}" class="rounded-circle" id="logo">
					<form class="form mt-3" method="POST" action="{{ route('login')}}">
						@csrf
						<label id="simap-text" class="mb-4ZZ">SIMAP Wikrama</label>
						<div class="form-group text-mx-auto">
							<input type="text" id="login" name="login" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} mt-4 mb-3" value="{{ old('username')}}" placeholder="Username" required autofocus>
							@if ($errors->has('username'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('username') }}</strong>
								</span>
							@endif
							<input type="password" id="password" name="password" class="form-control mt-3 mb-4 @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
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
						</div>
						<input type="submit" class="btn btn-primary btn-lg btn-block" id="btn" value="Masuk"></input>
						@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
								{{ __('Forgot Your Password?') }}
							</a>
						@endif
					</form>
				</div>
			</div>
		</div>
		@include('partials.loader')
		@include('partials.scripts')
		<script type="text/javascript">
			class Slideshow {

			  constructor() {
			    this.initSlides();
			    this.initSlideshow();
			  }

			  // Set a `data-slide` index on each slide for easier slide control.
			  initSlides() {
			    this.container = $('[data-slideshow]');
			    this.slides = this.container.find('img');
			    this.slides.each((idx, slide) => $(slide).attr('data-slide', idx));
			  }

			  // Pseudo-preload images so the slideshow doesn't start before all the images
			  // are available.
			  initSlideshow() {
			    this.imagesLoaded = 0;
			    this.currentIndex = 0;
			    this.setNextSlide();
			    this.slides.each((idx, slide) => {
			      $('<img>').on('load', $.proxy(this.loadImage, this)).attr('src', $(slide).attr('src'));
			    });
			  }

			  // When one image has loaded, check to see if all images have loaded, and if
			  // so, start the slideshow.
			  loadImage() {
			    this.imagesLoaded++;
			    if (this.imagesLoaded >= this.slides.length) { this.playSlideshow() }
			  }

			  // Start the slideshow.
			  playSlideshow() {
			    this.slideshow = window.setInterval(() => { this.performSlide() }, 5000);
			  }

			  // 1. Previous slide is unset.
			  // 2. What was the next slide becomes the previous slide.
			  // 3. New index and appropriate next slide are set.
			  // 4. Fade out action.
			  performSlide() {
			    if (this.prevSlide) { this.prevSlide.removeClass('prev fade-out') }

			    this.nextSlide.removeClass('next');
			    this.prevSlide = this.nextSlide;
			    this.prevSlide.addClass('prev');

			    this.currentIndex++;
			    if (this.currentIndex >= this.slides.length) { this.currentIndex = 0 }

			    this.setNextSlide();

			    this.prevSlide.addClass('fade-out');
			  }

			  setNextSlide() {
			    this.nextSlide = this.container.find(`[data-slide="${this.currentIndex}"]`).first();
			    this.nextSlide.addClass('next');
			  }

			}

			$(document).ready(function() {
			  new Slideshow;
			});

		</script>
	</body>
</html>