@extends('admin.layouts.app')

@section('stylesheets')

@endsection

@section('title')
	Rapot Siswa
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="shadow-sm p-3 bg-white rounded">
			<div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
				<div class="col-md-6 p-0">
					<p class="text-md-left">Nilai Siswa Kelas 12</p>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-sm hover data-table order-column dt-responsive display nowrap" style="width: 100%;">
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
		ajax: "{{ route('admin.rapot.kelas-12') }}",
		'columnDefs': [
		{
			"targets": 0,
			"className": "text-center order-column",
			"width": "1%"
		},
		{
		 "targets": 3,
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
			{data: 'nama_rayon', name: 'nama_rayon'},
			{data: 'nama_rombel', name: 'nama_rombel'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});

});
</script>
@endsection