@extends('guru.layouts.app')
 
@section('title')
 nilai
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="shadow-sm p-3 m-0 bg-white rounded">
      <div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
        <div class="col-md-12 p-0">
          <p class="text-md-center">Data nilai</p>
        </div>
      </div>
      <div class="table-responsive-md mt-3">
        <table class="table hover data-table-uas-genap order-column" id="data-table-uas-genap" style="width: 100%">
          <thead>
            <tr>
              <th scope="col" class="text-center">No</th>
              <th scope="col">NIS</th> 
              <th scope="col">Nama</th> 
              <th scope="col">Rombel</th>
              <th scope="col" class="text-center">UH 7</th>
              <th scope="col" class="text-center">UH 8</th>
              <th scope="col" class="text-center">UKK</th>
              <th scope="col" class="text-center">UH 7 K</th>
              <th scope="col" class="text-center">UH 8 K</th>
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
   
    // Restore scroll on number inpuas.
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
  var table = $('#data-table-uas-genap').DataTable({
    pageLength: 10,
    lengthMenu: [5, 10, 20, 50, 100],
    processing: true,
    serverSide: true,
    ajax: "{{ route('guru.nilai.uas-genap') }}",
    'columnDefs': [
    {
      "targets": 0,
      "className": "text-center order-column",
      "width": "1%"
    },
    {
      "targets": 3,
      "width": "20%",
      "className": "text-center"
    },
    {
      "targets": [4,5,6,7,8],
      "width": "10%",
      "className": "text-center"
    }
    ],
    columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'nis', name: 'nis'},
      {data: 'nama', name: 'nama'},
      {data: 'rombel', name: 'rombel'},
      {data: 'uh7', name: 'uh7', orderable: false, searchable: false},
      {data: 'uh8', name: 'uh8', orderable: false, searchable: false},
      {data: 'uas_genap', name: 'uas_genap', orderable: false, searchable: false},
      {data: 'uh7k', name: 'uh7k', orderable: false, searchable: false},
      {data: 'uh8k', name: 'uh8k', orderable: false, searchable: false},
    ],
  });

  function myCallbackFunction(updatedCell, updatedRow, oldValue){
    $.ajax({
      data: updatedRow.data(),
      url: "{{ route('guru.nilai.uas-genap.store') }}",
      type: "POST",
      dataType: 'json',
      success: function(data){
        alert('Data berhasil diubah');
        table.draw();
      },
      error: function(data){
        alert('Data gagal diubah');
        alert(data.response);
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