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
	<div class="col-12">
		<div class="shadow-sm p-3 bg-white rounded">
			<div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
				<div class="col-md-6 p-0">
					<p class="text-md-left">Data Guru</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="guruBaru" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah Guru</a>
					</p>
				</div>
			</div>
			<div class="table-responsive-md mt-3" id="tag_container">
				<table class="table table-sm hover data-table order-column" style="width: 100%">
					<thead>
						<tr>
							<th scope="col" class="text-center">No</th>
							<th scope="col">NIK</th>
							<th scope="col">Nama</th>
							<th scope="col">Alamat</th>
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
<div class="modal fade" id="formModel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h4 class="modal-title" id="formHeading"></h4>
			</div>
			<div class="modal-body">
				<form id="formGuru" name="formGuru" class="form-horizontal">
					<input type="hidden" name="guru_id" id="guru_id"></input>
					<div class="row form-group">
						<label for="nik">NIK</label>
						<input type="number" name="nik" id="nik" class="form-control" required>
					</div>
					<div class="row form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" id="nama" class="form-control">
					</div>
					<div class="row form-group">
						<label for="jk">Jenis Kelamin</label>
						<select name="jk" id="jk" class="form-control">
							<option value="" style="display: none">-- Pilih --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="row form-group">
						<label for="telp">No. HP</label>
						<input type="text" name="telp" id="telp" class="form-control" required>
					</div>
					<div class="row form-group">
						<label for="alamat">Alamat</label>
						<textarea id="alamat" name="alamat" class="form-control" required></textarea>
					</div>
					<div class="row form-group">
						<label for="mapel">Mata Pelajaran</label>
						<select name="mapel" id="mapel" class="form-control">
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
<div class="modal fade" id="dataModel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h4 class="modal-title">Biodata Guru</h4>
			</div>
			<div class="modal-body">
				<table class="table table-borderless">
					<tr>
						<td width="40%">Nama</td>
						<td width="10%">:</td>
						<td id="bio_nama"></td>
					</tr>
					<tr>
						<td width="40%">NIK</td>
						<td width="10%">:</td>
						<td id="bio_nik"></td>
					</tr>
					<tr>
						<td width="40%">Jenis Kelamin</td>
						<td width="10%">:</td>
						<td id="bio_jk"></td>
					</tr>
						<td width="40%">No. HP</td>
						<td width="10%">:</td>
						<td id="bio_telp"></td>
					</tr>
					<tr>
						<td width="40%">Alamat</td>
						<td width="10%">:</td>
						<td id="bio_alamat"></td>
					</tr>
					<tr>
						<td width="40%">Mata Pelajaran</td>
						<td width="10%">:</td>
						<td id="bio_mapel"></td>
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

	function fillMapel(){
		var select = $('#mapel');
		var op = "";
		$.ajax({
			type: 'get',
			url : "{{ route('admin.guru.show.mapel') }}",
			success:function(data){
				op+='<option value = "" disabled selected style = "display:none;">Pilih mapel</option>';
				for (var i = 0; i < data.length; i++) {
					op+='<option value = "' + data[i].id + '">' + data[i].nama + '</option>';
				}
				select.html("");
				select.append(op);
			},
			error: function (data) {
			  alert('Error : ' + data.responseText);
			  $('#saveBtn').html('Simpan');
		  }
		});
	}

	function fillMapelDiAjar(id){
		var select = $('#mapel');
		var op = "";
		fillMapel();
		$.ajax({
			type: 'get',
			url : "{{ route('admin.guru') }}" + "/" + id +"/mapel/edit",
			success:function(data){
				// $('#mapel > option').each(function(){
				// 	if (this.val() == data.id) {
					console.log(data.id);
				$('#mapel').val(data.id);
				// 	}
				// });
			},
			error: function (data) {
			  alert('Error : ' + data.responseText);
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
		ajax: "{{ route('admin.guru') }}",
		'columnDefs': [
		{
			"targets": 0,
			"className": "text-center order-column",
			"width": "1%"
		},
		{
			"targets": 2,
			"width": "30%"
		},
		{
			"targets": 3,
			"width": "30%"
		},
		{
			"targets": 4,
			"className": "text-center"
		}
		],
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'nik', name: 'nik'},
			{data: 'nama', name: 'nama'},
			{data: 'alamat', name: 'alamat'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});

	$('#guruBaru').click(function () {
		fillMapel();
		$('#saveBtn').val("create-guru");
		$('#guru_id').val('');
		$('#formGuru').trigger("reset");
		$('#formHeading').html("Guru Baru");
		$('#formModel').modal('show');
	});


	$('body').on('click', '.editData', function () {
		var data_id = $(this).data('id');
		$.get("{{ route('admin.guru') }}" +'/' + data_id +'/edit', function (data) {
			fillMapelDiAjar(data_id);
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
		$(this).html('Menyimpan..');
		var form = $('#formGuru').serialize();
		var guru_id = $('#guru_id').val();
		var nik = $('#nik').val();
		var nama = $('#nama').val();
		var alamat = $('#alamat').val();
		var jk = $('#jk').val();
		var telp = $('#telp').val();
		var mapel = $('#mapel').val();
		console.log(mapel);
		if (nik.length == 0 || nama.length == 0 || alamat.length == 0 || jk.length == 0 || telp.length == 0 || mapel.length == 0) {
			alert('Ada data yang kosong!');
			$('#saveBtn').html('Simpan');
			return false;
		}else{
			$.ajax({
			  data: $('#formGuru').serialize(),
			  url: "{{ route('admin.guru.store') }}",
			  type: "POST",
			  dataType: 'json',
			  success: function (data) {
				  $('#formGuru').trigger("reset");
				  $('#formModel').modal('hide');
				  $('#saveBtn').html('Simpan');
				  table.draw();
			  },
			  error: function (data) {
				  alert('Error :' + data.responseText);
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
				url: "{{ route('admin.guru') }}" +'/' + data_id +'/hapus',
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
		$.get("{{ route('admin.guru') }}" +'/' + data_id +'/show', function (data) {
			var tanggal = new Date(data.tanggal_lahir);
			$('#dataModel').modal('show');
			$('#bio_nik').html(data.nik);
			$('#bio_nama').html(data.nama);
			$('#bio_alamat').html(data.alamat);
			$('#bio_jk').html(data.jk);
			$('#bio_telp').html(data.telp);
			$('#bio_mapel').html(data.mapel);
		})
	});

	$('#hideBio').on('click', function(){
		$('#dataModel').modal('hide');
	})
 });
</script>
@endsection