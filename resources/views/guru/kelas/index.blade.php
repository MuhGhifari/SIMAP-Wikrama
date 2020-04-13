@extends('guru.layouts.app')
 
@section('title')
 nilai
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="shadow-sm p-3 m-0 bg-white rounded">
      <div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
        <div class="col-md-6 p-0">
          <p class="text-md-left"><a href="{{ route('guru.index') }}"><i class="fa fa-chevron-left"></i> </a>Data nilai</p>
        </div>
      </div>
      <div class="table-responsive-md mt-3">
        <table class="table hover tabel-siswa-kelas order-column" id="tabel-siswa-kelas" style="width: 100%">
          <thead>
            <tr>
              <th scope="col" class="text-center">No</th>
              <th scope="col">NISN</th> 
              <th scope="col">NIS</th> 
              <th scope="col">Nama</th> 
              <th scope="col">Rayon</th>
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

  var table = $('#tabel-siswa-kelas').DataTable({
    pageLength: 10,
    lengthMenu: [5, 10, 20, 50, 100],
    processing: true,
    serverSide: true,
    "order": [[ 3, "asc" ]],
    ajax: "{{ route('guru.absen.kelas.get') }}",
    'columnDefs': [
    {
      "targets": 0,
      "className": "text-center",
      "width": "1%"
    },
    {
      "targets": 4,
      "width": "15%",
      "className": "text-center"
    },
    {
      "targets": 3,
      "className": "order-column"
    }
    ],
    columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'nisn', name: 'nisn'},
      {data: 'nis', name: 'nis'},
      {data: 'nama', name: 'nama'},
      {data: 'rayon', name: 'rayon'},
    ],
  });
  
  
 });
</script>
@endsection