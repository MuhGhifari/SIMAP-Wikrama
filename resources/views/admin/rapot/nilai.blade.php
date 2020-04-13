@extends('admin.layouts.app')
 
@section('title')
 nilai
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="shadow-sm p-3 m-0 bg-white rounded">
      <div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
        <div class="col-md-6 p-0">
          <p class="text-md-left"><a href="{{ route('admin.rapot.kelas-10') }}"><i class="fa fa-chevron-left mr-3"></i></a> Biodata Siswa</p>
        </div>
        <div class="col-md-6 p-0">
          <p class="text-md-right">
            <a class="btn btn-success btn-sm" id="cetak" style="color: white;"><i class="fa fa-upload"></i> Cetak Rapot</a>
          </p>
        </div>
      </div>
      <div class="row pl-3 pr-3" style="font-size: 1.1em;">
        <div class="col-md-6">
          <table class="table">
            <tr>
              <td width="40%">NISN</td>
              <td width="10%">:</td>
              <td>{{ $siswa->nisn }}</td>
            </tr>
            <tr>
              <td width="40%">NIS</td>
              <td width="10%">:</td>
              <td>{{ $siswa->nis }}</td>
            </tr>
            <tr>
              <td width="40%">Nama</td>
              <td width="10%">:</td>
              <td>{{ $siswa->nama }}</td>
            </tr>
            <tr>
              <td width="40%">Jenis Kelamin</td>
              <td width="10%">:</td>
              <td>{{ $siswa->jk }}</td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table">
            <tr>
              <td width="40%">Agama</td>
              <td width="10%">:</td>
              <td>{{ $siswa->agama }}</td>
            </tr>
            <tr>
              <td width="40%">Rayon</td>
              <td width="10%">:</td>
              <td>{{ $siswa->rayon->nama }}</td>
            </tr>
            <tr>
              <td width="40%">Pembimbing</td>
              <td width="10%">:</td>
              <td>{{ $siswa->rayon->pembimbing->nama }}</td>
            </tr>
            <tr>
              <td width="40%">Rombel</td>
              <td width="10%">:</td>
              <td>{{ $siswa->rombel->nama }}</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row pl-3 pr-3 border-top border-bottom align-text-middle" style="font-size: 1.3em;">
        <div class="col-md-12 pt-3">
          <p class="text-md-center">Data nilai</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="table-responsive-md mt-3" style="width: 1100px;">
          <table class="table cell-border nowrap hover data-table-uts-ganjil" id="data-table-nilai">
            <thead>
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Mapel</th> 
                <th scope="col" class="text-center">UH 1</th>
                <th scope="col" class="text-center">UH 2</th>
                <th scope="col" class="text-center">UTS 1</th>
                <th scope="col" class="text-center">UH 1 K</th>
                <th scope="col" class="text-center">UH 2 K</th>
                <th scope="col" class="text-center">UH 3</th>
                <th scope="col" class="text-center">UH 4</th>
                <th scope="col" class="text-center">UAS</th>
                <th scope="col" class="text-center">UH 3 K</th>
                <th scope="col" class="text-center">UH 4 K</th>
                <th scope="col" class="text-center">UH 5</th>
                <th scope="col" class="text-center">UH 6</th>
                <th scope="col" class="text-center">UTS 2</th>
                <th scope="col" class="text-center">UH 5 K</th>
                <th scope="col" class="text-center">UH 6 K</th>
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
</div>
<div class="modal fade" id="formModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h4 class="modal-title" id="formHeading"></h4>
      </div>
      <div class="modal-body">
        <form id="formMapel" action="{{ route('admin.rapot.nilai.cetak', $siswa->nis) }}" method="post" name="formUlangan" class="form-horizontal">
          @csrf
          <input type="hidden" name="nis" id="nis" value="{{ $siswa->nis }}">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="ulangan">Semester</label>
                <select name="ulangan" id="ulangan" class="form-control" required>
                  <option value="" style="display: none">-- Pilih --</option>
                  <option value="uts_ganjil">UTS 1</option>
                  <option value="uas_ganjil">UAS</option>
                  <option value="uts_genap">UTS 2</option>
                  <option value="uas_genap">UKK</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sikap">Sikap</label>
                <select name="sikap" id="sikap" class="form-control" required>
                  <option value="" style="display: none">-- Pilih --</option>
                  <option value="sangat baik">Sangat Baik</option>
                  <option value="baik">Baik</option>
                  <option value="cukup">Cukup</option>
                  <option value="kurang">Kurang</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="upd">UPD</label>
                <select name="upd" id="upd" class="form-control" required>
                  <option value="" style="display: none">-- Pilih --</option>
                  <option value="sangat baik">Sangat Baik</option>
                  <option value="baik">Baik</option>
                  <option value="cukup">Cukup</option>
                  <option value="kurang">Kurang</option>
                </select>
              </div>
              <div class="form-group">
                <label for="pramuka">Pramuka</label>
                <select name="pramuka" id="pramuka" class="form-control" required>
                  <option value="" style="display: none">-- Pilih --</option>
                  <option value="sangat baik">Sangat Baik</option>
                  <option value="baik">Baik</option>
                  <option value="cukup">Cukup</option>
                  <option value="kurang">Kurang</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" required name="catatan"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group mt-4 col-12">
              <button type="submit" class="form-control btn btn-primary" id="saveBtn" value="create">Cetak</button>
            </div>
          </div>
        </form>
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

  var currentRoute = "{{ url()->current() }}";
  console.log(currentRoute);

  var table = $('#data-table-nilai').DataTable({
    pageLength: 10,
    lengthMenu: [5, 10, 20, 50, 100],
    processing: true,
    serverSide: true,
    scrollX:true,
    "searching":false,
    ajax: currentRoute + "/show",
    'columnDefs': [
    {
      "targets": 0,
      "className": "text-center order-column",
      "width": "1%"
    },
    {
      "targets": [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
      "width": "10%",
      "className": "text-center"
    }
    ],
    columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'nama_mapel', name: 'nama_mapel'},
      {data: 'uh1', name: 'uh1', orderable: false, searchable: false},
      {data: 'uh2', name: 'uh2', orderable: false, searchable: false},
      {data: 'uts_ganjil', name: 'uts_ganjil', orderable: false, searchable: false},
      {data: 'uh1k', name: 'uh1k', orderable: false, searchable: false},
      {data: 'uh2k', name: 'uh2k', orderable: false, searchable: false},
      {data: 'uh3', name: 'uh3', orderable: false, searchable: false},
      {data: 'uh4', name: 'uh4', orderable: false, searchable: false},
      {data: 'uas_ganjil', name: 'uas_ganjil', orderable: false, searchable: false},
      {data: 'uh3k', name: 'uh3k', orderable: false, searchable: false},
      {data: 'uh4k', name: 'uh4k', orderable: false, searchable: false},
      {data: 'uh5', name: 'uh5', orderable: false, searchable: false},
      {data: 'uh6', name: 'uh6', orderable: false, searchable: false},
      {data: 'uts_genap', name: 'uts_genap', orderable: false, searchable: false},
      {data: 'uh5k', name: 'uh5k', orderable: false, searchable: false},
      {data: 'uh6k', name: 'uh6k', orderable: false, searchable: false},
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
      url: "{{ route('admin.rapot.nilai.store', $siswa->nis) }}",
      type: "POST",
      dataType: 'json',
      success: function(data){
        alert('Data berhasil diubah');
        table.draw();
      },
      error: function(data){
        alert('Data gagal diubah : ' + data.response);
      }
    });
  }

  table.MakeCellsEditable({
    "onUpdate": myCallbackFunction,
    "inputCss": 'my-input-class',
    "columns": [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    "allowNulls":{
      "columns": [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
      "errorClass": 'error'
    },
    "confirmationButton":{
      "confirmCss": 'my-confirm-class',
      'cancelCss': 'my-cancel-class'
    },
    "inputTypes":[
      {
        "columns": [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
        "type": "number",
        "options": null
      }
    ]
  });

  $('#cetak').click(function () {
      $('#saveBtn').val("create-mapel");
      $('#formMapel').trigger("reset");
      $('#formHeading').html("Cetak Rapot");
      $('#formModal').modal('show');
    });

 });
</script>
@endsection