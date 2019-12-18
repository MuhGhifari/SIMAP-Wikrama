@extends('admin.layouts.app')
 
@section('title')
	Jurusan
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
					<p class="text-md-left">Data Jurusan</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="jurusanBaru" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah Jurusan</a>
					</p>
				</div>
			</div>
			<div class="table-responsive-md mt-3">
				<table class="table hover order-column data-table-jurusan">
					<thead>
						<tr>
							<th scope="col" class="text-center">No</th>
							<th scope="col">Nama</th> 
							<th scope="col">Kode/Singkatan</th>
							<th scope="col">Kaprog</th>
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
				<form id="formJurusan" name="formJurusan" class="form-horizontal">
					<input type="hidden" name="jurusan_id" id="jurusan_id"></input>
					<div class="row form-group">
						<label for="jurusan">Nama Jurusan</label>
						<input type="text" name="jurusan" id="jurusan" class="form-control" required>
					</div>
					<div class="row form-group">
						<label for="kode">Kode Jurusan</label>
						<input type="text" name="kode" id="kode" class="form-control" required>
					</div>
					<div class="row form-group">
						<label for="kaprog">Kepala Program</label>
						<select name="kaprog" id="kaprog" class="form-control">
						</select>
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

	function fillGuru(){
		var select = $('#kaprog');
		var op = "";
		$.ajax({
			type: 'get',
			url : "{{ route('admin.jurusan.calon') }}",
			success:function(data){
				op+='<option value = "" disabled selected style = "display:none;">Pilih Kaprog</option>';
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

	function fillKaprog(id){
		var select = $('#kaprog');
		var op = "";
		fillGuru();
		$.ajax({
			type: 'get',
			url : "{{ route('admin.jurusan') }}" + "/" + id +"/kaprog",
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

	var table = $('.data-table-jurusan').DataTable({
		pageLength: 10,
		lengthMenu: [5, 10, 20],
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.jurusan') }}",
		'columnDefs': [
		{
			"targets": 0,
			"className": "text-center order-column",
			"width": "1%"
		},
		{
			"targets": [2,4],
			"className": "text-center"
		}
		],
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'jurusan', name: 'jurusan'},
			{data: 'kode', name: 'kode'},
			{data: 'kaprog', name: 'kaprog'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});


	$('#jurusanBaru').click(function () {
		fillGuru();
		$('#saveBtn').val("create-jurusan");
		$('#jurusan_id').val('');
		$('#formJurusan').trigger("reset");
		$('#formHeading').html("Tambah Jurusan");
		$('#formModal').modal('show');
	});

	$('body').on('click', '.editData', function () {
		var data_id = $(this).data('id');
		$.get("{{ route('admin.jurusan') }}" +'/' + data_id +'/edit', function (data) {
			fillKaprog(data_id);
			$('#formHeading').html("Edit Data Jurusan");
			$('#saveBtn').val("edit-jurusan");
			$('#formModal').modal('show');
			$('#jurusan_id').val(data.id);
			$('#jurusan').val(data.nama);
			$('#kode').val(data.kode);
			$('#kaprog').val(data.kaprog_id);
	 });
	});

	$('#saveBtn').click(function (e) {
		e.preventDefault();
		$(this).html('Menyimpan..');
		var form = $('#formJurusan').serialize();
		var jurusan_id = $('#jurusan_id').val();
		var jurusan = $('#jurusan').val();
		var kode = $('#kode').val();
		var kaprog = $('#kaprog').val();
		if (jurusan.length == 0 || kode.length == 0 || kaprog.length == 0) {
			alert('Ada data yang kosong!');
			$('saveBtn').html('Simpan');
		}else{
			$.ajax({
			  data: $('#formJurusan').serialize(),
			  url: "{{ route('admin.jurusan.store') }}",
			  type: "POST",
			  dataType: 'json',
			  success: function (data) {
				  $('#formJurusan').trigger("reset");
				  $('#formModal').modal('hide');
				  $('#saveBtn').html('Simpan');
					fillGuru();
				  table.draw();
			  },
			  error: function (data) {
				  alert('Error:' + data.responseText);
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
				url: "{{ route('admin.jurusan') }}" +'/' + data_id +'/hapus',
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
</script>
@endsection