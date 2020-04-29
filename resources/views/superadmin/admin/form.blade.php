<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="au-breadcrumb-content">
            <div class="au-breadcrumb-left">
              <span class="au-breadcrumb-span">You are here:</span>
              <ul class="list-unstyled list-inline au-breadcrumb__list">
                <li class="list-inline-item active">
                  <a href="/{{ Auth::user()->role }}">Home</a>
                </li>
                <li class="list-inline-item seprate">
                  <span>/</span>
                </li>
                <li class="list-inline-item active">
                  <a href="{{ route('superadmin.daftar-admin') }}">Daftar Admin</a>
                </li>
                <li class="list-inline-item seprate">
                  <span>/</span>
                </li>
                <li class="list-inline-item">@if (empty($dataadmin))
                Create Akun Admin @else Edit Akun Admin @endif</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END BREADCRUMB-->

<!-- STATISTIC-->
<section class="statistic">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 bg-white">

          <form class="pt-3 pb-3" action="{{ empty($dataadmin) ? route('superadmin.storeadmin') : url('superadmin/daftar-admin/edit/'.$dataadmin->id.'') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @if (!empty ($dataadmin))
            <input type="hidden" name="_method" value="PUT">
            {{-- <input type="hidden" name="id" value="{{ !empty($dataadmin) ? $dataadmin->id : '' }}"> --}}
            @endif

            <div class="form-row">

              <div class="form-group col-md-6">
                <label for="namalengkap">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="namalengkap" placeholder="Masukkan Nama Lengkap" value="{{ !empty($dataadmin) ? $dataadmin->nama_lengkap : '' }} ">
                @error('nama_lengkap')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ !empty($dataadmin) ? $dataadmin->email : '' }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              {{-- <div class="form-group col-md-6">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Masukkan Username" value="{{ !empty($dataadmin) ? $dataadmin->username : '' }}">
                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> --}}

            </div>

            <div class="form-row">

              {{-- <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ !empty($dataadmin) ? $dataadmin->email : '' }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> --}}

              <div class="form-group col-md-6">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" readonly placeholder="Masukkan Username" value="{{ !empty($dataadmin) ? $dataadmin->username : '' }}">
                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              {{-- <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" value="">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> --}}

              <div class="form-group col-md-6">
                <label for="no_telepon">NO Telepon</label>
                <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="no_telepon" maxlength="13" placeholder="Masukkan NO Telepon" value="{{ !empty($dataadmin) ? $dataadmin->no_telepon : '' }}">
                @error('no_telepon')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

            </div>

            <div class="form-row">

              <div class="form-group col-md-6">
                <label for="kategori_id">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control js-example-basic-single @error('kategori_id') is-invalid @enderror">
                  <option value="" disabled selected>Pilih Kategori</option>
                  @foreach ($kategori as $kg)
                  <option value="{{ $kg->id_kategori }}" @if (!empty($dataadmin) && $dataadmin->kategori_id == $kg->id_kategori) selected @endif>{{ $kg->nama_kategori }}</option>
                  @endforeach
                </select>
                @error('kategori_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              {{-- <div class="form-group col-md-6">
                <label for="no_telepon">NO Telepon</label>
                <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="no_telepon" placeholder="Masukkan NO Telepon" value="{{ !empty($dataadmin) ? $dataadmin->no_telepon : '' }}">
                @error('no_telepon')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> --}}

              {{-- <div class="form-group col-md-6">
                <label for="image">Gambar</label>
                <img src="{{ asset('images/'.$dataadmin->image.'') }}" class="img-thumbnail" alt="">
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" placeholder="" value="{{ !empty($dataadmin) ? $dataadmin-> : ''image }}">
                @error('images')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> --}}

            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('superadmin.daftar-admin') }}" class="btn btn-danger">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END STATISTIC-->

<script>
  $(document).ready(function() {
    $('#email').on('input', function(){
    var email = $(this).val();
    var username = email.split('@');
      $('#username').val(username[0]);
    });
    
    $('.js-example-basic-single').select2();
  });
</script>




