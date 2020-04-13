@extends('guru.layouts.app')
 
@section('title')
 nilai
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
		<div class="shadow-sm p-3 m-0 bg-white rounded">
			<div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
				<div class="col-md-6 p-0">
					<p class="text-md-left">Data nilai</p>
				</div>
				<div class="col-md-6 p-0">
					<p class="text-md-right">
						<a id="rombelBaru" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-plus"></i> Tambah nilai</a>
					</p>
				</div>
			</div>
			<div class="table-responsive-md mt-3">
				<table class="cell-border hover" id="data-table-nilai-uts-ganjil" style="width: 100%">
					<thead>
						<tr>
							<th scope="col" class="text-center">No</th>
							<th scope="col">Nama</th> 
							<th scope="col">Rombel</th>
							<th scope="col" class="text-center">UH 1</th>
							<th scope="col" class="text-center">UH 2</th>
							<th scope="col" class="text-center">UTS</th>
							<th scope="col" class="text-center">NA</th>
							<th scope="col" class="text-center">UH 1 K</th>
							<th scope="col" class="text-center">UH 2 K</th>
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
<script src="{{ asset('js/dataTables.cellEdit.js')}}"></script>
<script src="{{ asset('js/edit-inline.js')}}"></script>
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
	var table = $('#data-table-nilai-uts-ganjil').DataTable({
		pageLength: 10,
		lengthMenu: [5, 10, 20, 50, 100],
		processing: true,
		serverSide: true,
		ajax: "{{ route('guru.nilai.uts.ganjil') }}",
		'columnDefs': [
		{
			"targets": 0,
			"className": "text-center order-column",
			"width": "1%"
		},
		{
			"targets": 2,
			"width": "20%",
			"className": "text-center"
		},
		{
			"targets": [3,4,5,6,7,8,9],
			"className": "text-center"
		}
		],
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'nama', name: 'nama'},
			{data: 'rombel', name: 'rombel'},
			{data: 'uh1', name: 'uh1', orderable: false, searchable: false},
			{data: 'uh2', name: 'uh2', orderable: false, searchable: false},
			{data: 'uts', name: 'uts', orderable: false, searchable: false},
			{data: 'na', name: 'na', orderable: false, searchable: false},
			{data: 'uh1k', name: 'uh1k', orderable: false, searchable: false},
			{data: 'uh2k', name: 'uh2k', orderable: false, searchable: false},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		],
	});

	function myCallbackFunction(updatedCell, updatedRow, oldValue){
		$.ajax({
			data: updatedRow.data(),
			url: "{{ route('guru.nilai.uts.ganjil.store') }}",
			type: "POST",
			dataType: 'json',
			success: function(data){
				table.draw();
			},
			error: function(data){
				alert('Error:' + data.response);
			}
		});
	}

	table.MakeCellsEditable({
		"onUpdate": myCallbackFunction,
		"inputCss": 'my-input-class',
		"columns": [3,4,5,6,7,8],
		"allowNulls":{
			"columns": [3,4,5,6,7,8],
			"errorClass": 'error'
		},
		"confirmationButton":{
			"confirmCss": 'my-confirm-class',
			'cancelCss': 'my-cancel-class'
		},
		"inputTypes":[
			{
				"columns": [3,4,5,6,7,8],
				"type": "text",
				"options": null
			}
		]
	});
 });
</script>
@endsection