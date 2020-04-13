@extends('admin.layouts.app')

@section('title')
   Mapel {{ $rombel->nama }}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="shadow-sm p-3 bg-white rounded">
			<div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
				<div class="col-md-6 p-0">
					<p class="text-md-left"><a href="{{ route('admin.rombel') }}"><i class="fa fa-chevron-left mr-3"></i></a>Mata Pelajaran {{ $rombel->nama }}</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="mapelBaru" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah mapel</a>
					</p>
				</div>
			</div>
			<div class="row justify-content-center">
				@if( count($rombel->kelasAjar) == 0)
				<div class="p-5 align-text-middle text-center">
					<h4>No Results</h4>
				</div>
				@endif
				@foreach($rombel->kelasAjar as $kelasAjar)
				<div class="col-lg-3 col-sm-6">
        	<div class="card-box bg-orange">
            <div class="inner">
              <h3> {{ $kelasAjar->guru->mapel->nama	 }} </h3>
              <p> {{ $kelasAjar->guru->nama }} </p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            </div>
            <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{ $kelasAjar->id }}" class="card-box-footer showDetail">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
            <a href="{{ route('admin.rombel.kelas-ajar.delete', ['id' => $kelasAjar->id, 'rombel_id' => $kelasAjar->rombel_id]) }}" class="card-box-btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus ini ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
        </div>
        @endforeach
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="formModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h4 class="modal-title" id="formHeading"></h4>
			</div>
			<div class="modal-body">
				<form id="formMapel" action="{{ route('admin.rombel.kelas-ajar.store') }}" method="post" name="formMapel" class="form-horizontal">
					@csrf
					<input type="hidden" name="kelasajar_id" id="kelasajar_id"></input>
					<input type="hidden" name="rombel_id" id="rombel_id" value="{{ $rombel->id }}">
					<div class="row form-group">
						<label for="mapel">Mata Pelajaran</label>
						<select name="mapel" id="mapel" class="form-control dynamic" data-dependent="guru" required>
							<option value="" style="display: none">-- Pilih --</option>
							@foreach($availableMapel as $m)
							<option value="{{ $m->id }}">{{ $m->nama }}</option>
							@endforeach
						</select>
					</div>
					<div class="row form-group">
						<label for="guru">Guru Mata Pelajaran</label>
						<select name="guru" disabled id="guru" class="form-control">
							<option value="" style="display: none">-- Pilih --</option>
						</select>
					</div>
					<div class="row form-group mt-4">
						<button type="submit" class="form-control btn btn-primary" id="saveBtn" value="create">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="dataModel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h4 class="modal-title">Detail Pelajaran</h4>
			</div>
			<div class="modal-body">
				<table class="table table-borderless">
					<tr>
						<td width="40%">Mata Pelajaran</td>
						<td width="10%">:</td>
						<td id="bio_mapel"></td>
					</tr>
					<tr>
						<td width="40%">Kode Mapel</td>
						<td width="10%">:</td>
						<td id="bio_kode"></td>
					</tr>
					<tr>
						<td width="40%">Kompetensi</td>
						<td width="10%">:</td>
						<td id="bio_kompetensi"></td>
					</tr>
					<tr>
						<td width="40%">Guru</td>
						<td width="10%">:</td>
						<td id="bio_guru"></td>
					</tr>
					<tr>
						<td width="40%">Kelas</td>
						<td width="10%">:</td>
						<td id="bio_kelas"></td>
					</tr>
				</table>
				<button class="btn btn-primary col-12" id="hideBio">Kembali</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function () {
		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});	

		$('#mapel').change(function(){
			if ($(this).val() !='') {
				var mapel_id= $(this).val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url:"{{ route('admin.rombel.kelas-ajar.guru') }}",
					method: "POST",
					data:{mapel_id:mapel_id, _token:_token},
					success:function(result){
						$('#guru').html(result);
						$('#guru').prop("disabled", false);
					}
				})
			}
		});

		$('#mapelBaru').click(function () {
			$('#saveBtn').val("create-mapel");
			$('#mapel_id').val('');
			$('#formMapel').trigger("reset");
			$('#formHeading').html("Tambah Mata Pelajaran");
			$('#formModal').modal('show');
		});

		$('body').on('click', '.showDetail', function(){
			var data_id = $(this).data('id');
			$.get("/admin/rombel/kelas-ajar/"+data_id+"/show-detail", function(data){
				console.log(data);
				$('#dataModel').modal('show');
				$('#bio_mapel').html(data.mapel);
				$('#bio_kode').html(data.kode);
				$('#bio_kompetensi').html(data.kompetensi);
				$('#bio_guru').html(data.pengajar);
				$('#bio_kelas').html(data.rombel);
			})
		});

		$('#hideBio').on('click', function(){
			$('#dataModel').modal('hide');
		})

		$('#formModal').on('hidden.bs.modal', function(e){
			$('#guru').prop("disabled", true);
		});

	});
</script>
@endsection
