@extends('admin.layouts.app')
 
@section('title')
 Rombel
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
					<p class="text-md-left">Data Rombel</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="rombelBaru" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah Rombel</a>
					</p>
				</div>
			</div>
			<div class="table-responsive-md mt-3">
				<table class="table hover data-table-rombel order-column">
					<thead>
						<tr>
							<th scope="col" class="text-center">No</th>
							<th scope="col">Rombel</th> 
							<th scope="col">Jurusan</th>
							<th scope="col" class="text-center">Jumlah Siswa</th>
							<th scope="col">Tahun Ajaran</th>
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
<div class="modal fade" id="formModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h4 class="modal-title" id="formHeading"></h4>
			</div>
			<div class="modal-body">
				<form id="formRombel" name="formRombel" class="form-horizontal">
					<input type="hidden" name="rombel_id" id="rombel_id"></input>
					<div class="row form-group">
						<label for="rombel">Rombel</label>
						<input type="text" name="rombel" id="rombel" class="form-control" required>
					</div>
					<div class="row form-group">
						<label for="tingkatan">Tingkatan</label>
						<select name="tingkatan" id="tingkatan" class="form-control">
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</div>
					<div class="row form-group">
						<label for="jurusan">Jurusan</label>
						<select name="jurusan" id="jurusan" class="form-control">
							<option value="">-- Pilih --</option>
							@foreach($jurusan as $j)
							<option value="{{ $j->id }}">{{ $j->kode }}</option>
							@endforeach
						</select>
					</div>
					<div class="row form-group">
						<label for="tahun_ajaran">Tahun Ajaran</label>
						<input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" required>
					</div>
					<div class="row form-group mt-3">
						<button type="submit" class="form-control btn btn-primary" id="saveBtn" value="create">Simpan</button>
					</div>
				</form>
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
 rombel
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

	var table = $('.data-table-rombel').DataTable({
		pageLength: 10,
		lengthMenu: [5, 10, 20, 50, 100],
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.rombel') }}",
		'columnDefs': [
		{
			"targets": 0,
			"className": "text-center order-column",
			"width": "1%"
		},
		{
			"targets": 3,
			"className": "text-center",
			"width": "10%"
		},
		{
			"targets": 2,
			"width": "30%"
		},
		{
			"targets": [4,5],
			"className": "text-center"
		}
		],
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'rombel', name: 'rombel'},
			{data: 'jurusan', name: 'jurusan'},
			{data: 'jumlah_siswa', name: 'jumlah_siswa'},
			{data: 'tahun_ajaran', name: 'tahun_ajaran'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});

	$('#rombelBaru').click(function () {
		$('#saveBtn').val("create-rombel");
		$('#rombel_id').val('');
		$('#formModal').trigger("reset");
		$('#formHeading').html("Rombel Baru");
		$('#formModal').modal('show');
	});

	$('body').on('click', '.editData', function () {
		var data_id = $(this).data('id');
		$.get("{{ route('admin.rombel') }}" +'/' + data_id +'/edit', function (data) {
			$('#formHeading').html("Edit Data rombel");
			$('#saveBtn').val("edit-rombel");
			$('#formModal').modal('show');
			$('#rombel_id').val(data.id);
			$('#rombel').val(data.nama);
			$('#jurusan').val(data.jurusan_id);
			$('#tingkatan').val(data.tingkatan);
			$('#tahun_ajaran').val(data.tahun_ajaran);
		})
	 });

	$('#saveBtn').click(function (e) {
		e.preventDefault();
		$(this).html('Menyimpan..');
		var form = $('#formRombel').serialize();
		var rombel_id = $('rombel_id').val();
		var rombel = $('rombel').val();
		var tingkatan = $('tingkatan').val();
		var jurusan = $('jurusan').val();
		var tahun_ajaran = $('tahun_ajaran').val();
		if (rombel_id === "" &&  rombel === "" && tingkatan === "" && jurusan === "" && tahun_ajaran === "") {
			alert('Ada data yang kosong!');
			$('saveBtn').html('Simpan');
		}else{
			$.ajax({
			  data: $('#formRombel').serialize(),
			  url: "{{ route('admin.rombel.store') }}",
			  type: "POST",
			  dataType: 'json',
			  success: function (data) {
				  $('#formRombel').trigger("reset");
				  $('#formModal').modal('hide');
				  $('#saveBtn').html('Simpan');
				  table.draw();
			  },
			  error: function (data) {
				  alert('Error:' + data.response);
				  $('#saveBtn').html('Simpan');
			  }
		  });
		}
	});

	$('body').on('click', '.deleteData', function () {

		var data_id = $(this).data("id");
		var v = confirm("Klik OK untuk hapus permanen!");
		if (v == true) {
			$.ajax({
				type: "DELETE",
				url: "{{ route('admin.rombel') }}" +'/' + data_id +'/hapus',
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
 });
</script>
@endsection