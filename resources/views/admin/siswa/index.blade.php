@extends('admin.layouts.app')
 
@section('title')
	Siswa
@endsection

@section('stylesheets')
<style type="text/css">
	/* Hide HTML5 Up and Down arrows. */
		input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}
		 
		input[type="number"] {
			-moz-appearance: textfield;
		}

		input[type="date"]::-webkit-outer-spin-button, input[type="date"]::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}
		 
		input[type="date"] {
			-moz-appearance: textfield;
		}
</style>
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="shadow-sm p-3 bg-white rounded">
			<div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
				<div class="col-md-6 p-0">
					<p class="text-md-left">Data siswa</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="importSiswa" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-upload"></i> Upload Excel</a>
						<a id="siswaBaru" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah siswa</a>
					</p>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-sm hover data-table order-column dt-responsive display nowrap">
					<thead>
						<tr>
							<th scope="col" class="text-center">No</th>
							<th scope="col">NIS</th> 
							<th scope="col">Nama</th>
							<th scope="col" class="text-center">Rayon</th>
							<th scope="col" class="text-center">Rombel</th>
							<th scope="col" class="text-center">Opsi</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="ajaxModel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h4 class="modal-title" id="modelHeading"></h4>
			</div>
			<div class="modal-body">
				<form id="formSiswa" name="formSiswa" class="form-horizontal">
				  <input type="hidden" name="siswa_id" id="siswa_id">
				  <div class="row">
					  <div class="col-7">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="nisn">NISN</label>
								<input type="number" class="form-control" id="nisn" name="nisn" required>
							</div>
							<div class="form-group col-md-6">
								<label for="nis">NIS</label>
								<input type="number" class="form-control" id="nis" name="nis" required>
							</div>
							
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" required>
						</div>
						<div class="row">
							<div class="form-group col-md-7">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
							</div>
							<div class="form-group col-md-5">
								<label for="tempat_lahir">Tanggal Lahir</label>
								<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-5">
								<label class="control-label">Jenis Kelamin</label>
								<select class="form-control" name="jk" id="jk" required>
									<option value="Laki-laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group col-md-7">
								<label for="asal_sekolah">Asal Sekolah</label>
								<input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" required>
							</div>
						</div>
					  </div>
					  <div class="col-5">
						<div class="form-group">
							<label for="telp">No. HP</label>
							<input type="text" name="telp" id="telp" class="form-control">
						</div>
						<div class="row">
							<div class="form-group col-md-7">
								<label for="rombel">Rombel</label>
								<select class="form-control" name="rombel" id="rombel" required>
									@foreach($rombel as $r)
									
									<option class="form-control" value="{{ $r->id }}">{{ $r->nama }}</option>
									@endforeach
								
								</select>
							</div>
							<div class="form-group col-md-5">
								<label for="rayon">Rayon</label>
								<select class="form-control" name="rayon" id="rayon" required>
									@foreach($rayon as $r)

									<option class="form-control" value="{{ $r->id }}">{{ $r->nama }}</option>
									@endforeach

								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-7">
								<label for="agama">Agama</label>
								<select class="form-control" name="agama" id="agama" required>
									<option value="Islam">Islam</option>
									<option value="Katolik">Katolik</option>
									<option value="Protestan">Protestan</option>
									<option value="Hindu">Hindu</option>
									<option value="Buddha">Buddha</option>
									<option value="Kong Hu Chu">Kong Hu Chu</option>
								</select>
							</div>
						</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea id="alamat" name="alamat" required class="form-control" style="height: 100%;"></textarea>
							</div>
					  </div>
				  </div>
					<div class="form-group mt-3">
					 <button type="submit" class="form-control btn btn-primary" id="saveBtn" value="create">Simpan
					 </button>
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
				<h4 class="modal-title">Biodata Siswa</h4>
			</div>
			<div class="modal-body">
				<table class="table table-borderless">
					<tr>
						<td width="40%">Nama</td>
						<td width="10%">:</td>
						<td id="bio_nama"></td>
					</tr>
					<tr>
						<td width="40%">NISN</td>
						<td width="10%">:</td>
						<td id="bio_nisn"></td>
					</tr>
					<tr>
						<td width="40%">NIS</td>
						<td width="10%">:</td>
						<td id="bio_nis"></td>
					</tr>
					<tr>
						<td width="40%">Jenis Kelamin</td>
						<td width="10%">:</td>
						<td id="bio_jk"></td>
					</tr>
					<tr>
						<td width="40%">Agama</td>
						<td width="10%">:</td>
						<td id="bio_agama"></td>
					</tr>
					<tr>
						<td width="40%">Tempat, Tanggal Lahir</td>
						<td width="10%">:</td>
						<td id="bio_ttl"></td>
					</tr>
					<tr>
						<td width="40%">Rayon</td>
						<td width="10%">:</td>
						<td id="bio_rayon"></td>
					</tr>
					<tr>
						<td width="40%">Rombel</td>
						<td width="10%">:</td>
						<td id="bio_rombel"></td>
					</tr>
					<tr>
						<td width="40%">Asal Sekolah</td>
						<td width="10%">:</td>
						<td id="bio_asal_sekolah"></td>
					</tr>
					<tr>
						<td width="40%">No. HP</td>
						<td width="10%">:</td>
						<td id="bio_telp"></td>
					</tr>
					<tr>
						<td width="40%">Alamat</td>
						<td width="10%">:</td>
						<td id="bio_alamat"></td>
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

	// number keys
	
	jQuery(document).ready( function($) {
 
	// Disable scroll when focused on a number input.
	$('form').on('focus', 'input[type=number]', function(e) {
		$(this).on('wheel', function(e) {
			e.preventDefault();
		});
	});
 
	// Restore scroll on number inputs.
	$('form').on('blur', 'input[type=number]', function(e) {
		$(this).off('wheel');
	});
 
	// Disable up and down keys.
	$('form').on('keydown', 'input[type=number]', function(e) {
		if ( e.which == 38 || e.which == 40 )
			e.preventDefault();
	});  
	  
});

	// Datatable
 $(function () {

  $.ajaxSetup({
	  headers: {
		  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	var table = $('.data-table').DataTable({
		pageLength: 10,
		lengthMenu: [5, 10, 20, 50, 100],
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.siswa') }}",
		'columnDefs': [
		{
			"targets": 0,
			"className": "text-center order-column",
			"width": "1%"
		},
		{
	 "targets": 3, // your case first column
	 "className": "text-center"
		},
		{
			"targets": 4,
			"className": "text-center"
		},
		{
			"targets": 5,
			"className": "text-center"
		}],
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'nis', nama: 'nis'},
			{data: 'nama', name: 'nama'},
			{data: 'rayon', name: 'rayon'},
			{data: 'rombel', name: 'rombel'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});

	$('#siswaBaru').click(function () {
		$('#saveBtn').val("create-siswa");
		$('#siswa_id').val('');
		$('#formSiswa').trigger("reset");
		$('#modelHeading').html("Tambah Siswa");
		$('#ajaxModel').modal('show');
	});

	$('body').on('click', '.editData', function () {
		var data_id = $(this).data('id');
		$.get("{{ route('admin.siswa') }}" +'/' + data_id +'/edit', function (data) {
			$('#modelHeading').html("Edit Data Siswa");
			$('#saveBtn').val("edit-siswa");
			$('#ajaxModel').modal('show');
			$('#siswa_id').val(data.id);
			$('#nisn').val(data.nisn);
			$('#nis').val(data.nis);
			$('#nama').val(data.nama);
			$('#rayon').val(data.rayon_id);
			$('#rombel').val(data.rombel_id);
			$('#alamat').val(data.alamat);
			$('#jk').val(data.jk);
			$('#telp').val(data.telp);
			$('#agama').val(data.agama);
			$('#tempat_lahir').val(data.tempat_lahir);
			$('#tanggal_lahir').val(data.tanggal_lahir);
			$('#asal_sekolah').val(data.asal_sekolah);
		})
	});

	function nullChecker(){
		
	}

	$('#saveBtn').click(function (e) {
		e.preventDefault();
		$(this).html('Menyimpan..');
		var form = $('#formSiswa').serialize();
		var siswa_id = $('siswa_id').val();
		var nisn = $('nisn').val();
		var nis = $('nis').val();
		var nama = $('nama').val();
		var rayon = $('rayon').val();
		var rombel = $('rombel').val();
		var alamat = $('alamat').val();
		var jk = $('jk').val();
		var telp = $('telp').val();
		var agama = $('agama').val();
		var tempat_lahir = $('tempat_lahir').val();
		var tanggal_lahir = $('tanggal_lahir').val();
		var asal_sekolah = $('asal_sekolah').val();
		if (siswa_id === "" && nisn === "" && nis === "" && nama === "" && rayon === "" && rombel === "" && alamat === "" && jk === "" && telp === "" && agama === "" && tempat_lahir === "" && tanggal_lahir === "" && asal_sekolah  === "") {
			alert('Ada data yang kosong!');
			$('#saveBtn').html('Simpan');
			return false;
		}else{
			$.ajax({
			  data: $('#formSiswa').serialize(),
			  url: "{{ route('admin.siswa.store') }}",
			  type: "POST",
			  dataType: 'json',
			  success: function (data) {
				  $('#formSiswa').trigger("reset");
				  $('#ajaxModel').modal('hide');
				  $('#saveBtn').html('Simpan');
				  table.draw();
			  },
			  error: function (data) {
				  alert('Ada data duplikat!');
				  $('#saveBtn').html('Simpan');
			  }
		  })
		}
	});

	$('body').on('click', '.deleteData', function () {

		var siswa_id = $(this).data("id");
		var v = confirm("Klik OK untuk hapus permanen!");
		if (v == true) {
			$.ajax({
				type: "DELETE",
				url: "{{ route('admin.siswa') }}" +'/' + siswa_id +'/hapus',
				success: function (data) {
					table.draw();
					alert('Data berhasil dihapus.');
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}
	});

	$('body').on('click', '.showData', function(){
		var data_id = $(this).data('id');
		$.get("{{ route('admin.siswa') }}" +'/' + data_id +'/show', function (data) {
			var tanggal = new Date(data.tanggal_lahir);
			$('#dataModel').modal('show');
			$('#bio_nisn').html(data.nisn);
			$('#bio_nis').html(data.nis);
			$('#bio_nama').html(data.nama);
			$('#bio_rayon').html(data.rayon);
			$('#bio_rombel').html(data.rombel);
			$('#bio_alamat').html(data.alamat);
			$('#bio_jk').html(data.jk);
			$('#bio_telp').html(data.telp);
			$('#bio_agama').html(data.agama);
			$('#bio_ttl').html(data.tempat_lahir + ', ' + formatTanggal(tanggal));
			$('#bio_tanggal_lahir').html(data.tanggal_lahir);
			$('#bio_asal_sekolah').html(data.asal_sekolah);
		})
	});

	$('#hideBio').on('click', function(){
		$('#dataModel').modal('hide');
	})
 });
</script>
@endsection

