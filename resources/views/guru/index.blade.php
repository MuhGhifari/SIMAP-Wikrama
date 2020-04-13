@extends('guru.layouts.app')

@section('title')
   Guru
@endsection

@section('content')
   			<div class="row">
   				<div class="col-12">
						<div class="shadow-sm p-3 bg-white rounded">
              <div class="header pb-4 border-bottom">
							 <h5 class="display-4 text-center mb-3">Kelas Saya</h5> 
              </div>
              <?php
              $sepuluh = 0; 
              foreach ($guru->kelasAjar as $kelasAjar) {
                if ($kelasAjar->rombel->tingkatan == 10) {
                  $sepuluh++;
                }
              } ?>
              <div class="row justify-content-center">
                @if( count($guru->kelasAjar) == 0)
                <div class="p-5 align-text-middle text-center">
                  Belum ada kelas
                </div>
                @endif
              </div>
              @if($sepuluh > 0)
              <div class="row pl-3 pr-3 pt-3 border-bottom align-text-middle" style="font-size: 1.3em;">
                <div class="col-md-6 p-0">
                  <p style="font-size: 1.3em;" class="text-md-left">Kelas 10</p>
                </div>
              </div>
              @endif
              <div class="row">
                @foreach($guru->kelasAjar as $kelasAjar)
                  @if($kelasAjar->rombel->tingkatan == 10)
                  <div class="col-lg-3 col-sm-6">
                    <div class="card-box bg-green">
                      <div class="inner">
                        <h3> {{ $kelasAjar->rombel->nama  }} </h3>
                        <p> {{ $kelasAjar->rombel->jurusan->nama }} </p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                      </div>
                      <a href="{{ route('guru.index.absen.kelas', $kelasAjar->rombel_id )}}" class="card-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  @endif
                @endforeach
							</div>
              <?php
              $sebelas = 0; 
              foreach ($guru->kelasAjar as $kelasAjar) {
                if ($kelasAjar->rombel->tingkatan == 12) {
                  $sebelas++;
                }
              } ?>
              @if($sebelas > 0)
              <div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
                <div class="col-md-6 p-0">
                  <p style="font-size: 1.3em;" class="text-md-left">Kelas 11</p>
                </div>
              </div>
              @endif
              <div class="row">
                @foreach($guru->kelasAjar as $kelasAjar)
                  @if($kelasAjar->rombel->tingkatan == 11)
                  <div class="col-lg-3 col-sm-6">
                    <div class="card-box bg-red">
                      <div class="inner">
                        <h3> {{ $kelasAjar->rombel->nama  }} </h3>
                        <p> {{ $kelasAjar->rombel->jurusan->nama }} </p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                      </div>
                      <a href="{{ route('guru.index.absen.kelas', $kelasAjar->rombel_id )}}" class="card-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  @endif
                @endforeach
              </div>
              <?php
              $duabelas = 0; 
              foreach ($guru->kelasAjar as $kelasAjar) {
                if ($kelasAjar->rombel->tingkatan == 12) {
                  $duabelas++;
                }
              } ?>
              @if($duabelas > 0)
              <div class="row pl-3 pr-3 border-bottom align-text-middle" style="font-size: 1.3em;">
                <div class="col-md-6 p-0">
                  <p style="font-size: 1.3em;" class="text-md-left">Kelas 12</p>
                </div>
              </div>
              @endif
              <div class="row">
                @foreach($guru->kelasAjar as $kelasAjar)
                  @if($kelasAjar->rombel->tingkatan == 12)
                  <div class="col-lg-3 col-sm-6">
                    <div class="card-box bg-blue">
                      <div class="inner">
                        <h3> {{ $kelasAjar->rombel->nama  }} </h3>
                        <p> {{ $kelasAjar->rombel->jurusan->nama }} </p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                      </div>
                      <a href="{{ route('guru.index.absen.kelas', $kelasAjar->rombel_id )}}" class="card-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  @endif
                @endforeach
              </div>
						</div>
   				</div>
   			</div>
@endsection
