@extends('admin.layouts.app')
 
@section('title')
	Import Siswa
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="shadow-sm p-3 bg-white rounded">
			<h5 class="display-4 text-center">Import Data Excel Siswa</h5>
			<div class="row p-3 mt-5">	
				<div class="col-md-4">
					<div class="card" style="border:none;">
							<img class="card-img-top" src="{{ asset('images/screenshot.png') }}"></img>
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
							<img class="card-img-top" src="{{ asset('images/screenshot.png') }}"></img>
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
							<img class="card-img-top" src="{{ asset('images/screenshot.png') }}"></img>
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
				<input type="file" name="file" id="file">
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
</script>
@endsection