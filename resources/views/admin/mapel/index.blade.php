@extends('admin.layouts.app')
 
@section('title')
	mapel
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

		.data-table-mapel td:nth-child(4){
			text-transform: capitalize;
		}
</style>
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="shadow-sm p-3 bg-white rounded">
			<div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
				<div class="col-md-6 p-0">
					<p class="text-md-left">Data mapel</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="mapelBaru" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah mapel</a>
					</p>
				</div>
			</div>
			<div class="table-responsive-md mt-3">
				<table class="table hover order-column data-table-mapel" style="width: 100%">
					<thead>
						<tr>
							<th scope="col" class="text-center">No</th>
							<th scope="col">Mata Pelajaran</th> 
							<th scope="col">Kode Mapel</th>
							<th scope="col">KKM</th>
							<th scope="col">Kompetensi</th>
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
				<form id="formMapel" name="formMapel" class="form-horizontal">
					<input type="hidden" name="mapel_id" id="mapel_id"></input>
					<div class="row">
						<div class="form-group col-12">
							<label for="mapel">Nama mapel</label>
							<input type="text" name="mapel" id="mapel" class="form-control" required>
						</div>
					</div>
					<div class="row p-0">
						<div class="form-group col-8">
							<label for="kode">Kode Mapel</label>
							<input type="text" name="kode" id="kode" class="form-control" required>
						</div>
						<div class="form-group col-4">
							<label for="kkm">KKM</label>
							<input type="number" max="100" min="0" name="kkm" id="kkm" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12">
							<label for="kompetensi">Kompetensi</label>
							<select name="kompetensi" id="kompetensi" class="form-control">
								<option value="" style="display: none">-- Pilih --</option>	
								<option value="umum">Umum</option>
								<option value="kejuruan">Kejuruan</option>
							</select>
						</div>
					</div>
					<div class="row mt-4">
						<div class="form-group col-12">
							<button type="submit" class="form-control btn btn-primary" id="saveBtn" value="create">Simpan</button>
						</div>
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

	var table = $('.data-table-mapel').DataTable({
		pageLength: 10,
		lengthMenu: [5, 10, 20],
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.mapel') }}",
		'columnDefs': [
		{
			"targets": 0,
			"className": "text-center order-column",
			"width": "1%"
		},
		{
			"targets": [3,4,5],
			"className": "text-center"
		}
		],
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'nama', name: 'nama'},
			{data: 'kode', name: 'kode'},
			{data: 'kkm', name: 'kkm'},
			{data: 'kompetensi', name: 'kompetensi'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});


	$('#mapelBaru').click(function () {
		
		$('#saveBtn').val("create-mapel");
		$('#mapel_id').val('');
		$('#formMapel').trigger("reset");
		$('#formHeading').html("Tambah mapel");
		$('#formModal').modal('show');
	});

	$('body').on('click', '.editData', function () {
		var data_id = $(this).data('id');
		console.log(data_id);
		$.get("{{ route('admin.mapel') }}" +'/' + data_id +'/edit', function (data) {
			$('#formHeading').html("Edit Data mapel");
			$('#saveBtn').val("edit-mapel");
			$('#formModal').modal('show');
			$('#mapel_id').val(data.id);
			$('#mapel').val(data.nama);
			$('#kode').val(data.kode);
			$('#kkm').val(data.kkm);
			$('#kompetensi').val(data.kompetensi);
	 });
	});

	$('#saveBtn').click(function (e) {
		e.preventDefault();
		$(this).html('Menyimpan..');
		var form = $('#formMapel').serialize();
		var mapel_id = $('#mapel_id').val();
		var mapel = $('#mapel').val();
		var kode = $('#kode').val();
		var kkm = $('#kkm').val();
		var kompetensi = $('#kompetensi').val();
		if (mapel.length == 0 && kode.length == 0 && kompetensi.length == 0) {
			alert('Ada data yang kosong!');
			$('#saveBtn').html('Simpan');
		}else{
			$.ajax({
			  data: $('#formMapel').serialize(),
			  url: "{{ route('admin.mapel.store') }}",
			  type: "POST",
			  dataType: 'json',
			  success: function (data) {
				  $('#formMapel').trigger("reset");
				  $('#formModal').modal('hide');
				  $('#saveBtn').html('Simpan');
					
				  table.draw();
			  },
			  error: function (data) {
				  alert('Error:');
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
				url: "{{ route('admin.mapel') }}" +'/' + data_id +'/hapus',
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