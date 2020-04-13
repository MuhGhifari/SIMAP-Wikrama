<!DOCTYPE html>
<html>
<head>
  <title>cetak</title>
  @include('partials.stylesheets')
</head>
<body>
<div class="container" style="width:900px">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-2">
          <img class="w-100" src="{{ asset('images/logo_wikrama.png') }}">
        </div>
        <div class="col-lg-10 text-right header-raport">
          <p class="font-weight-bold">YAYASAN PRAWIRAMA <br> SMK WIKRAMA BOGOR</p>
          <p style="font-size: 0.8em">Jalan Raya Wangun Kel. Sindangsari - Bogor, Telp/Fax(0251)8242411</p>
          <p style="font-size: 0.8em">Website : www.smkwikrama.sch.id, e-mail : prohumas@smkwikrama.net</p>
        </div>
      </div><hr style="border: 1.5px solid #000;">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center black-color font-weight-bold">
          <p>LAPORAN PENCAPAIAN KOMPETENSI PESETA DIDIK</p>
          <br>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 black-color near-margin">
          <p>NIS</p>
          <p>Nama</p>
          <p>Kompetensi Keahlian</p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 black-color near-margin">
          <p>: {{ $siswa->nis}} </p>
          <p>: {{ $siswa->nama}}</p>
          <p>: {{ $siswa->rombel->jurusan->nama}}</p>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 black-color near-margin">
          <p>Tahun Pelajaran</p>
          <p>Semester</p>
          <p>Kelas</p>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 black-color near-margin">
          <p>: {{$siswa->rombel->tahun_ajaran }}
          </p>
          <p>:
            @if($ulangan == 'uts_ganjil' || $ulangan == 'uas_ganjil')
            1 (satu)
            @elseif($ulangan == 'uts_genap' || $ulangan == 'uas_genap')
            2 (dua)
            @endif
          </p>
          <p>: {{ $siswa->rombel->nama }}
          </p>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 text-left mt-4">
          <p class="font-weight-bold black-color">A. Nilai Akademik</p>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 pl-5">
          <table class="table table-bordered black-color table-nilai">
            <thead>
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Pengetahuan</th>
                <th scope="col">KKM</th>
                <th scope="col">Nilai Akhir</th>
                <th scope="col">Keterampilan</th>
                <th scope="col">Predikat</th>
              </tr>
            </thead>
            <tbody>
              <?php $index = 1 ?>
              @foreach($nilai as $mapel)
              <tr>
                <th scope="row" class="text-center">{{ $index }}</th>
                <td> {{ $mapel->guru->mapel->nama}} <br> <small>Guru : {{ $mapel->guru->nama }}</small> </td>
                @if($ulangan == 'uts_ganjil')
                <td class="text-center">
                  @if( $mapel->uts_ganjil == null)
                  -
                  @else
                  {{ $mapel->uts_ganjil }}
                  @endif
                </td>
                <td class="text-center">{{ $mapel->guru->mapel->kkm }}</td>
                <td class="text-center nilai_akhir">
                  <?php 
                    $nilai_akhir = (($mapel->uts_ganjil * 1) + ($mapel->uh1 * 3) + ($mapel->uh2 * 3)) / 7;
                   ?>
                  @if($nilai_akhir == 0)
                  -
                  @else
                  {{ round($nilai_akhir) }}
                  @endif
                </td>
                <td class="text-center">
                  <?php 
                    $nilai_akhir = (($mapel->uh1k * 3) + ($mapel->uh2k * 3)) / 6;
                   ?>
                  @if($nilai_akhir == 0)
                  -
                  @else
                  {{ round($nilai_akhir) }}
                  @endif
                </td>
                <td class="text-center">
                  @if($nilai_akhir >= 90)
                  A
                  @elseif($nilai_akhir >=80)
                  B
                  @elseif($nilai_akhir >=75)
                  C
                  @elseif($nilai_akhir == 0)
                  -
                  @else
                  D
                  @endif
                </td>
                @endif
                @if($ulangan == 'uas_ganjil')
                <td class="text-center">
                  @if( $mapel->uas_ganjil == null)
                  -
                  @else
                  {{ $mapel->uas_ganjil }}
                  @endif
                </td>
                <td class="text-center">{{ $mapel->guru->mapel->kkm }}</td>
                <td class="text-center nilai_akhir">
                  <?php 
                    $nilai_akhir = (($mapel->uas_ganjil * 1) + ($mapel->uh3 * 3) + ($mapel->uh4 * 3)) / 7;
                   ?>
                  @if($nilai_akhir == 0)
                  -
                  @else
                  {{ round($nilai_akhir) }}
                  @endif
                </td>
                <td class="text-center"> 
                  <?php 
                    $nilai_akhir = (($mapel->uh3k * 3) + ($mapel->uh4k * 3)) / 6;
                   ?>
                  @if($nilai_akhir == 0)
                  -
                  @else
                  {{ round($nilai_akhir) }}
                  @endif 
                </td>
                <td class="text-center">
                  @if($nilai_akhir >= 90)
                  A
                  @elseif($nilai_akhir >=80)
                  B
                  @elseif($nilai_akhir >=75)
                  C
                  @else
                  D
                  @endif
                </td>
                @endif
                @if($ulangan == 'uts_genap')
                <td class="text-center">
                  @if( $mapel->uts_genap == null)
                  -
                  @else
                  {{ $mapel->uts_genap }}
                  @endif
                </td>
                <td class="text-center">{{ $mapel->guru->mapel->kkm }}</td>
                <td class="text-center nilai_akhir">
                  <?php 
                    $nilai_akhir = (($mapel->uts_genap * 1) + ($mapel->uh5 * 3) + ($mapel->uh6 * 3)) / 7;
                   ?>
                  @if($nilai_akhir == 0)
                  -
                  @else
                  {{ round($nilai_akhir) }}
                  @endif
                </td>
                <td class="text-center">
                  <?php 
                    $nilai_akhir = (($mapel->uh5k * 3) + ($mapel->uh6k * 3)) / 6;
                   ?>
                  @if($nilai_akhir == 0)
                  -
                  @else
                  {{ round($nilai_akhir) }}
                  @endif
                </td>
                <td class="text-center">
                  @if($nilai_akhir >= 90)
                  A
                  @elseif($nilai_akhir >=80)
                  B
                  @elseif($nilai_akhir >=75)
                  C
                  @else
                  D
                  @endif
                </td>
                @endif
                @if($ulangan == 'uas_genap')
                <td class="text-center">
                  @if( $mapel->uas_genap == null)
                  -
                  @else
                  {{ $mapel->uas_genap }}
                  @endif
                </td>
                <td class="text-center">{{ $mapel->guru->mapel->kkm }}</td>
                <td class="text-center nilai_akhir">
                  <?php 
                    $nilai_akhir = (($mapel->uas_genap * 1) + ($mapel->uh7 * 3) + ($mapel->uh8 * 3)) / 7;
                   ?>
                  @if($nilai_akhir == 0)
                  -
                  @else
                  {{ round($nilai_akhir) }}
                  @endif
                </td>
                <td class="text-center">
                <?php 
                    $nilai_akhir = (($mapel->uh7k * 3) + ($mapel->uh8k * 3)) / 6;
                   ?>
                  @if($nilai_akhir == 0)
                  -
                  @else
                  {{ round($nilai_akhir) }}
                  @endif
                </td>
                <td class="text-center">
                  @if($nilai_akhir >= 90)
                  A
                  @elseif($nilai_akhir >=80)
                  B
                  @elseif($nilai_akhir >=75)
                  C
                  @elseif($nilai_akhir < 75)
                  D
                  @else
                  -
                  @endif
                </td>
                @endif
              </tr>
              <?php $index++; ?>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 text-left mt-4">
          <p class="font-weight-bold black-color">B. Catatan Akademik</p>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 pl-5">
          <table class="table table-bordered black-color">
            <tr>
              <td>{{ $catatan }}</td>
            </tr> 
          </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 text-left mt-4">
          <p class="font-weight-bold black-color">C. Nilai Ekstrakulikuler</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 pl-5">
          <table class="table table-bordered black-color">
            <tr>
              <td class="font-weight-bold text-center">Ekstrakulikuler</td>
              <td class="font-weight-bold text-center">Keterangan</td>
            </tr>
            <tr>
              <td>UPD</td>
              <td id="upd-nilai" class="text-center">{{ ucfirst($upd) }}</td>
            </tr>
            <tr>
              <td>Pramuka</td>
              <td id="pramuka-nilai" class="text-center">{{ ucfirst($pramuka) }}</td>
            </tr>
            <tr>
              <td>Sikap</td>
              <td id="sikap-nilai" class="text-center">{{ ucfirst($sikap) }}</td>
            </tr>
          </table>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
              Kepala Sekolah
            </div>
            <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
              Pembimbing Rayon
            </div>
            <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
              Orang Tua
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
              <hr style="border: 1px solid #000; width: 150px;">
            </div>
            <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
              <hr style="border: 1px solid #000; width: 150px;">
            </div>
            <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
              <hr style="border: 1px solid #000; width: 150px;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  window.print();
</script>
</body>
</html>