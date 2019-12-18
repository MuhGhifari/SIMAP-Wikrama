@extends('admin.layouts.app')
 
@section('title')
	Admin
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
	<div class="col-5">
		<div class="shadow-sm p-3 bg-white rounded">
			<div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
				<div class="col-md-6 p-0">
					<p class="text-md-left">Data Rombel</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="rombelBaru" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah</a>
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
	<div class="col-7">
		<div class="shadow-sm p-0 bg-white rounded">
			<div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
				<div class="col-md-6 p-0">
					<p class="text-md-left">Data Jurusan</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="jurusanBaru" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah</a>
					</p>
				</div>
			</div>
			<div class="table-responsive-md mt-3">
				<table class="table hover order-column">
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

	var table_rombel = $('.data-table-rombel').DataTable({
		pageLength: 5,
		lengthMenu: [5, 10, 20, 50, 100],
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.kelas.rombel') }}",
		'columnDefs': [
		{
			"targets": 0,
			"className": "text-center order-column",
			"width": "1%"
		},
		{
			"targets": [2,3,4],
			"className": "text-center"
		}
		],
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'rombel', name: 'rombel'},
			{data: 'jurusan', name: 'jurusan'},
			{data: 'tahun_ajaran', name: 'tahun_ajaran'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});

	var table_jurusan = $('.data-table-jurusan').DataTable({
		pageLength: 5,
		lengthMenu: [5, 10, 20],
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.kelas.jurusan') }}",
		'columnDefs': [
		{
			"targets": 0,
			"className": "text-center order-column",
			"width": "1%"
		},
		{
			"targets": [2,3,4],
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

	$('#guruBaru').click(function () {
		$('#saveBtn').val("create-guru");
		$('#guru_id').val('');
		$('#formGuru').trigger("reset");
		$('#formHeading').html("Guru Baru");
		$('#formModel').modal('show');
	});


	$('body').on('click', '.editData', function () {
		var data_id = $(this).data('id');
		$.get("{{ route('admin.guru') }}" +'/' + data_id +'/edit', function (data) {
			$('#formHeading').html("Edit Data Guru");
			$('#saveBtn').val("edit-guru");
			$('#formModel').modal('show');
			$('#guru_id').val(data.id);
			$('#nik').val(data.nik);
			$('#nama').val(data.nama);
			$('#alamat').val(data.alamat);
			$('#jk').val(data.jk);
			$('#telp').val(data.telp);
		})
	 });

	$('#saveBtn').click(function (e) {
		e.preventDefault();
		$(this).html('Sending..');
		var form = $('#formGuru').serialize();
		console.log(form);
		$.ajax({
		  data: $('#formGuru').serialize(),
		  url: "{{ route('admin.guru.store') }}",
		  type: "POST",
		  dataType: 'json',
		  success: function (data) {
			  $('#formGuru').trigger("reset");
			  $('#formModel').modal('hide');
			  $('#saveBtn').html('Save Changes');
			  table.draw();
		  },
		  error: function (data) {
			  alert('Error:');
			  $('#saveBtn').html('Save Changes');
		  }
	  });
	});

	$('body').on('click', '.deleteData', function () {

		var data_id = $(this).data("id");
		confirm("Klik OK untuk konfirmasi penghapusan");

		$.ajax({
			type: "DELETE",
			url: "{{ route('admin.guru') }}" +'/' + data_id +'/hapus',
			success: function (data) {
				table.draw();
				alert('Data berhasil dihapus.');
			},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});
 });
</script>
@endsection