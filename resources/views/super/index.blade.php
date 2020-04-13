@extends('super.layouts.app')

@section('content')
<div id="wrapper" class="container" style="
  margin-top: 100px; 
  ">
   <div class="card">
   	<div class="card-header">
   		<div class="row pl-3 pr-3 align-text-middle" style="font-size: 1.3em;">
				<div class="col-md-6 p-0">
					<p class="text-md-left">Data Administrator Kurikulum</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="userBaru" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah Admin</a>
					</p>
				</div>
			</div>
   	</div>
	  <div class="card-body">
			<div class="table-responsive">
		   	<table class="table hover data-table order-column dt-responsive display nowrap" style="width: 100%;">
			 	<thead>
			   	<tr>
					 	<th scope="col" class="text-center">No</th>
					 	<th scope="col">Nama</th>
					 	<th scope="col">Username</th> 
					 	<th scope="col">Email</th>
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
				<form id="formUser" name="formUser" class="form-horizontal">
					<input type="hidden" name="user_id" id="user_id"></input>
					<div class="row form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" id="nama" class="form-control" required>
					</div>
					<div class="row form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" required>
					</div>
					<div class="row form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" required>
            @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
					</div>
					<div class="row form-group">
						<label for="password_baru">Password</label>
						<input type="password" autocomplete="new-password" name="password_baru" id="password_baru" class="form-control" required>
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
   $(function(){
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
		 ajax: "{{ route('superadmin.index') }}",
		 'columnDefs': [
		 {
			"targets": 0,
			"className": "text-center order-column",
			"width": "1%"
		 },
		 {
			"targets": 4,
			"className": "text-center"
		 }],
		 columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'name', name: 'name'},
			{data: 'username', nama: 'username'},
			{data: 'email', name: 'email'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		 ]
	  });

	  $('#userBaru').click(function () {
	  	$('#saveBtn').val("create-user");
	  	$('#user_id').val('');
	  	$('#formModal').trigger("reset");
	  	$('#formHeading').html("User Baru");
	  	$('#formModal').modal('show');
	  });

	  $('body').on('click', '.editData', function () {
	  	var data_id = $(this).data('id');
	  	$.get("{{ route('superadmin.index') }}" +'/' + data_id +'/edit', function (data) {
	  		$('#formHeading').html("Edit Data User");
	  		$('#saveBtn').val("edit-user");
	  		$('#formModal').modal('show');
	  		$('#user_id').val(data.id);
	  		$('#nama').val(data.name);
	  		$('#email').val(data.email);
	  		$('#username').val(data.username);
	  		$('#password_baru').val(data.password);
	  	})
	   });

	  $('#saveBtn').click(function (e) {
	  	e.preventDefault();
	  	$(this).html('Menyimpan..');
	  	var form = $('#formUser').serialize();
	  	var user_id = $('#user_id').val();
	  	var nama = $('#nama').val();
	  	var email = $('#email').val();
	  	var username = $('#username').val();
	  	var password_baru = $('#password_baru').val();
	  	if (nama.length == 0 || email.length == 0 || username.length == 0 || password_baru.length == 0) {
	  		alert('Ada data yang kosong!');
	  	  $('#saveBtn').html('Simpan');	
	  	}
	  	else{
	  		$.ajax({
	  		  data: $('#formUser').serialize(),
	  		  url: "{{ route('superadmin.index.store') }}",
	  		  type: "POST",
	  		  dataType: 'json',
	  		  success: function (data) {
	  			  $('#formUser').trigger("reset");
	  			  $('#formModal').modal('hide');
	  			  $('#saveBtn').html('Simpan');
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
	  			url: "{{ route('superadmin.index') }}" +'/' + data_id +'/hapus',
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
