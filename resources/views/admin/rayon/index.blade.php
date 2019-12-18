@extends('admin.layouts.app')
 
@section('title')
	Rayon
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
					<p class="text-md-left">Data Rayon</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="rayonBaru" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah Rayon</a>
					</p>
				</div>
			</div>
			<div class="table-responsive-md mt-3">
				<table class="table hover order-column data-table-rayon">
					<thead>
						<tr>
							<th scope="col" class="text-center">No</th>
							<th scope="col">Nama Rayon</th> 
							<th scope="col">Pembimbing</th>
							<th scope="col">Jumlah Siswa</th>
							<th scope="col">Ruangan</th>
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
				<form id="formRayon" name="formRayon" class="form-horizontal">
					<input type="hidden" name="rayon_id" id="rayon_id"></input>
					<div class="row form-group">
						<label for="rayon">Nama Rayon</label>
						<input type="text" name="rayon" id="rayon" class="form-control" required>
					</div>
					<div class="row form-group">
						<label for="ruangan">Ruangan Rayon</label>
						<input type="text" name="ruangan" id="ruangan" class="form-control" required>
					</div>
					<div class="row form-group">
						<label for="pembimbing">Pembimbing</label>
						<select name="pembimbing" id="pembimbing" class="form-control">
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
@endsection

@section('scripts')
<script type="text/javascript">

	function fillGuru(){
		var select = $('#pembimbing');
		var op = "";
		$.ajax({
			type: 'get',
			url : "{{ route('admin.rayon.calon') }}",
			success:function(data){
				op+='<option value = "" disabled selected style = "display:none;">Pilih pembimbing</option>';
				for (var i = 0; i < data.length; i++) {
					op+='<option value = "' + data[i].id + '">' + data[i].nama + '</option>';
				}
				select.html("");
				select.append(op);
			},
			error: function (data) {
			  console.log(data.response);
			  $('#saveBtn').html('Simpan');
		  }
		});
	}

	function fillPembimbing(id){
		var select = $('#pembimbing');
		var op = "";
		fillGuru();
		$.ajax({
			type: 'get',
			url : "{{ route('admin.rayon') }}" + "/" + id +"/pembimbing",
			success:function(data){
				console.log(data);
				// for (var i = 0; i < data.length; i++) {
				op+='<option value = "' + data.id + '" selected>' + data.nama + '</option>';
				// }
				select.append(op);
			},
			error: function (data) {
			  console.log(data.response);
			  $('#saveBtn').html('Simpan');
		  }
		});
	}
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
	  
	fillGuru();
});
	// Datatable
 $(function () {

  $.ajaxSetup({
	  headers: {
		  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	var table = $('.data-table-rayon').DataTable({
		pageLength: 10,
		lengthMenu: [5, 10, 20],
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.rayon') }}",
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
			{data: 'rayon', name: 'rayon'},
			{data: 'pembimbing', name: 'pembimbing'},
			{data: 'jumlah_siswa', name: 'jumlah_siswa'},
			{data: 'ruangan', name: 'ruangan'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});


	$('#rayonBaru').click(function () {
		fillGuru();
		$('#saveBtn').val("create-rayon");
		$('#rayon_id').val('');
		$('#formRayon').trigger("reset");
		$('#formHeading').html("Tambah rayon");
		$('#formModal').modal('show');
	});

	$('body').on('click', '.editData', function () {
		var data_id = $(this).data('id');
		console.log(data_id);
		$.get("{{ route('admin.rayon') }}" +'/' + data_id +'/edit', function (data) {
			fillPembimbing(data_id);
			$('#formHeading').html("Edit Data rayon");
			$('#saveBtn').val("edit-rayon");
			$('#formModal').modal('show');
			$('#rayon_id').val(data.id);
			$('#rayon').val(data.nama);
			$('#ruangan').val(data.ruangan);
			$('#pembimbing').val(data.pembimbing_id);
	 });
	});

	$('#saveBtn').click(function (e) {
		e.preventDefault();
		$(this).html('Menyimpan..');
		var form = $('#formRayon').serialize();
		var rayon_id = $('rayon_id').val();
		var rayon = $('rayon').val();
		var ruangan = $('ruangan').val();
		var pembimbing = $('pembimbing').val();
		if (rayon_id === "" && rayon === "" && ruangan === "" && pembimbing === "") {
			alert('Ada data yang kosong!');
			$('saveBtn').html('Simpan');
		}else{
			$.ajax({
			  data: $('#formRayon').serialize(),
			  url: "{{ route('admin.rayon.store') }}",
			  type: "POST",
			  dataType: 'json',
			  success: function (data) {
				  $('#formRayon').trigger("reset");
				  $('#formModal').modal('hide');
				  $('#saveBtn').html('Simpan');
					fillGuru();
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
				url: "{{ route('admin.rayon') }}" +'/' + data_id +'/hapus',
				success: function (data) {
					table.draw();
					fillGuru();
					alert('Data berhasil dihapus.');
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}
	});
 });
@endsection