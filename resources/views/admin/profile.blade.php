<!DOCTYPE html>
<html>
<head>
  <title>SIMAP admin - Profile Saya</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('partials.stylesheets')
</head>
<body>
  @include('partials.nav')
  <div id="wrapper" style="margin-top: 100px;" class="container">
    <div class="row">
      <div class="col-12">
        <a href="{{ route('admin.index') }}" style="text-decoration-line: none; color: white" class=" btn btn-primary m-2">
          <i class="fa fa-chevron-left"></i> Kembali
        </a>
        <div class="shadow-sm p-4 bg-white rounded">
          <div class="row">
            <div class="col-4">
              <div class="profile-photo-container">
                <a href="javascript:void(0)" id="profile-image" title="Ubah Foto Profil">
                  <img style="vertical-align: middle; border-radius: 100%" src="/storage/user_avatar/{{ auth()->user()->avatar }}" class="w-100">
                </a>
              </div>
            </div>
            <div class="col-8">
              <div class="row pb-2 border-bottom">
                <div class="header ">
                  <h5 class="display-4 text-left">Profil Saya</h5>
                </div>
              </div>
              <div class="row pt-3">
                <div class="col-md-12 black-color near-margin">
                  <table class="table table-borderless table-lg" style="font-size: 1.2em">
                    <tbody>
                      <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>{{ $user->name }}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                          @if(empty($user->email))
                          -
                          @else
                          {{ $user->email }}
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td>{{ $user->username }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <button id="ubah_password" class="btn btn-success"><i class="fa fa-key"></i> Ganti passsword</button>          
                  <button id="ubah_data" class="btn btn-warning"><i class="fa fa-pencil-alt"></i> Ubah Data</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalData" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h4 class="modal-title">Edit Biodata</h4>
      </div>
      <div class="modal-body">
        <form id="formData" action="{{ route('admin.profile.bio.store') }}" method="post" name="formData" class="form-horizontal">
          @csrf
          <div class="row form-group">
          </div>
          <div class="row form-group">
            <label class="col-4" for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control col-8" required>
          </div>
          <div class="row form-group">
            <label class="col-4" for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control col-8" required>
          </div>
          <div class="row form-group">
            <label class="col-4" for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control col-8" required>
            @if ($errors->has('username'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
            @endif
          </div>
          <div class="row form-group mt-4">
            <button type="submit" class="form-control btn btn-primary" id="saveDataBtn" value="create">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalPassword" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h4 class="modal-title">Ganti Password</h4>
      </div>
      <div class="modal-body">
        <form id="formPassword" action="{{ route('admin.profile.password.store') }}" method="post" name="formPassword" class="form-horizontal">
          @csrf
          <div class="form-group row mt-2">
            <label for="password" class="col-4 col-form-label">Password Baru</label>
            <input id="password" type="password" autocomplete="new-password" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} col-md-8" value="{{ old('username') }} name="password" required>
            @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group row mb-2">
            <label for="password-confirm" class="col-md-4 col-form-label">Konfirmasi</label>
            <input id="password-confirm" autocomplete="off" type="password" class="form-control col-md-8" name="password_confirmation" required>
          </div>
          <div class="row form-group mt-4">
            <button type="submit" class="form-control btn btn-primary" id="savePasswordBtn" value="create">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalFoto" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h4 class="modal-title">Ganti Foto Profil</h4>
      </div>
      <div class="modal-body">
        <form id="formFoto" action="{{ route('admin.profile.photo.store') }}" method="post" name="formFoto" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="row form-group">
            <input type="file" name="foto" class="form-group-file">
          </div>
          <div class="row form-group mt-4">
            <label><small style="color: red;">*Foto harus memiliki tinggi & lebar yang sama!*</small></label>
            <button type="submit" class="form-control btn btn-primary" id="saveFotoBtn" value="create">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
@include('partials.scripts')
<script type="text/javascript">
  $( document ).ready(function() {
      $('input').attr('autocomplete','off');
  });
  $(function(){
    $('#ubah_password').on('click', function(){
      $('#modalPassword').modal('show');
      $('#password').val('');
      $('#password_confirmation').val('');
    });
    $('#ubah_data').on('click', function(){
      $('#modalData').modal('show');
      $('#nama').val("{{ $user->name }}");
      $('#email').val("{{ $user->email }}");
      $('#username').val("{{ $user->username }}");
    });
    $('#profile-image').on('click', function(){
      $('#modalFoto').modal('show');
    }); 
  });
</script>
</html>