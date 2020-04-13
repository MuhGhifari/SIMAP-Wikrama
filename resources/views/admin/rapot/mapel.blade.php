@extends('admin.layouts.app')

@section('title')
   Mapel {{ $siswa->nama }}
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="shadow-sm p-3 bg-white rounded">
      <div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
        <div class="col-md-6 p-0">
          <p class="text-md-left"><a href="{{ route('admin.rapot.kelas-10') }}"><i class="fa fa-chevron-left mr-3"></i></a>Mata Pelajaran {{ $siswa->nama }}</p>
        </div>
      </div>
      <div class="row justify-content-center">
        @foreach($siswa->rombel->kelasAjar as $kelasAjar)
        <div class="col-lg-3 col-sm-6">
          <div class="card-box bg-blue">
            <div class="inner">
              <h3> {{ $kelasAjar->guru->mapel->nama  }} </h3>
              <p> {{ $kelasAjar->guru->nama }} </p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            </div>
            <a href="{{ route('admin.rapot.kelas-10.mapel.nilai', ['nis' => $siswa->nis, 'mapel_id' => $kelasAjar->guru->id]) }}" data-toggle="tooltip" data-id="{{ $kelasAjar->id }}" class="card-box-footer showDetail">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection