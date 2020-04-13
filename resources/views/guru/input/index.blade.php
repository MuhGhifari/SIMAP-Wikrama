@extends('guru.layouts.app')
 
@section('title')
	Import Siswa
@endsection

@section('links')
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:300,400,700'>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/ionicons/1.5.2/css/ionicons.min.css">
@endsection

@section('stylesheets')
<style type="text/css">
	figure {
	  cursor: pointer;
	}
	figure:before,
	figure:after {
	  position: absolute;
	}
	figure:before {
	  top: 103.5px;
	  left: 50%;
	  margin-left: -25px;
	  width: 50px;
	  height: 50px;
	  border: 3px solid #cccccc;
	  border-radius: 25px;
	  background-color: rgba(204, 209, 217, 0.3);
	  font-family: 'Ionicons';
	  content: '\f215';
	  text-align: center;
	  line-height: 45px;
	  font-size: 19px;
	  color: #cccccc;
	}
	figure.play:before {
	  display: none;
	}
	figure.play:after {
	  color: #fff;
	  background-color: #0a45f0;
	}
</style>
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="shadow-sm p-3 bg-white rounded">
			<h5 class="display-4 text-center">Import Data Excel Siswa</h5>
			<div class="row p-3 mt-5">	
				<div class="col-md-4">
					<div class="card" style="border:none;">
						<div class="step1 shadow-sm border" style="padding: 2px;">
							<figure>
								<img class="card-img-top" src="{{ asset('images/import-siswa-step-1.png') }}" data-alt="{{ asset('images/import-siswa-step-1.gif') }}" alt="Step 1"></img>	
							</figure>
						</div>
						<div class="card-body pl-0 pr-0">	
							<h5 class="card-title text-center">	
								Sesuaikan Excel dengan Template
							</h5>	
							<p class="card-text text-center">Pastikan header dalam excel sudah sesuai dengan template yang sudah disediakan. Klik <a href="">disini</a> untuk mendownload template.</p>	
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="border:none;">
						<div class="step shadow-sm border" style="padding: 2px;">
							<figure>
								<img class="card-img-top" src="{{ asset('images/import-siswa-step-1.png') }}"
								data-alt="{{ asset('images/import-siswa-step-1.gif') }}" alt="Step 1"</img>
							</figure>
						</div>
						<div class="card-body pl-0 pr-0">	
							<h5 class="card-title text-center">	
								Step 2
							</h5>	
							<p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>	
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="border:none;">
						<div class="step shadow-sm border" style="padding: 2px;">
							<figure>
								<img class="card-img-top" src="{{ asset('images/import-siswa-step-1.png') }}"
								data-alt="{{ asset('images/import-siswa-step-1.gif') }}" alt="Step 1"</img>
							</figure>
						</div>
						<div class="card-body pl-0 pr-0">	
							<h5 class="card-title text-center">	
								Step 3
							</h5>	
							<p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>	
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-2 mb-4">
				<button id="fileChooser" class="btn btn-primary btn-lg mx-auto" style="width: 200px;">Upload Excel</button>
			</div>	
		</div>
	</div>
</div>
<div class="modal fade" id="modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Pilih File Excel</h4>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" action="{{ route('admin.siswa.import.store') }}">
					@csrf	
					<input id="file" type="file" name="file" class="form-control">
					<br>
					<button class="btn btn-success">Import Data Siswa</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$('body').on('click', '#fileChooser', function(){
		$('#modal').modal('show');
	});

  // Get the .gif images from the "data-alt".
	var getGif = function() {
		var gif = [];
		$('img').each(function() {
			var data = $(this).data('alt');
			gif.push(data);
		});
		return gif;
	}

	var gif = getGif();

	// Preload all the gif images.
	var image = [];

	$.each(gif, function(index) {
		image[index]     = new Image();
		image[index].src = gif[index];
	});

	// Change the image to .gif when clicked and vice versa.
	$('figure').on('click', function() {

		var $this   = $(this),
				$index  = $this.index(),
				
				$img    = $this.children('img'),
				$imgSrc = $img.attr('src'),
				$imgAlt = $img.attr('data-alt'),
				$imgExt = $imgAlt.split('.');
				
		if($imgExt[1] === 'gif') {
			$img.attr('src', $img.data('alt')).attr('data-alt', $imgSrc);
		} else {
			$img.attr('src', $imgAlt).attr('data-alt', $img.data('alt'));
		}

		// Add play class to help with the styling.
		$this.toggleClass('play');

	});
</script>
@endsection