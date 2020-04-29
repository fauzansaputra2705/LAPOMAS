{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta content='#BE0A31' name='theme-color'/>
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/logofavicon.png')}}">
  <title>Register Aplikasi Pengaduan</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{('mdbpro/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{('mdbpro/css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{('mdbpro/css/bgstyle.css')}}" rel="stylesheet">
  <style>

    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1100px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 700px;
      }
    }

    .top-nav-collapse {
      background-color: #39448c !important;
    }

    .navbar:not(.top-nav-collapse) {
      background: transparent !important;
    }

    @media (max-width: 991px) {
     .navbar:not(.top-nav-collapse) {
      background: #39448c !important;
    }
  }
  
  h6 {
    line-height: 1.7;
  }
  
</style>
</head>

<body>
  <!-- Main navigation -->
  <header>
    <!-- Navbar -->

    <!-- Navbar -->
    <!-- Full Page Intro -->
    <div class="view"
    style="background-image: url('{{asset('img/1234.jpg')}}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!-- Mask & flexbox options-->
    <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
      <!-- Content -->
      <div class="container">
        <!--Grid row-->
        <div class="row mt-5">
          <!--Grid column-->
          <div class="col-md-7 mb-5 mt-md-0 mt-5 white-text text-center text-md-left">
            <h1 class="h1-responsive font-weight-bold wow fadeInLeft" data-wow-delay="0.3s">Aplikasi LAPOMAS!!</h1>
            <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
            <h6 class="mb-3 wow fadeInLeft" data-wow-delay="0.3s">Sebuah aplikasi untuk membantu masyarakat memberitahu secara anonim maupun tidak, disertai permintaan oleh pihak yang berkepentingan atau pihak yang berwenang untuk menindak lanjuti suatu pengaduan</h6>
            <a href="#" class="btn btn-outline-white wow fadeInLeft" data-wow-delay="0.3s">Silahkan Register</a>
          </div>
          <!--Grid column-->
          <!--Grid column-->
          <div class="col-md-5 col-xl-5 mb-4">
            <!--Form-->
            <div class="card wow fadeInRight" data-wow-delay="0.3s">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="card-body">
                  <!--Header-->
                  <div class="text-center">
                    <h3 class="white-text">
                      <i class="fa fa-user white-text"></i> Register:</h3>
                      <hr class="hr-light">
                    </div>
                    <!--Body-->

                    <div class="md-form">
                      <i class="fa fa-envelope prefix white-text active"></i>
                      <input type="email" name="email" id="email"
                      class="white-text form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                      required autocomplete="email" autofocus>
                      @error('email')
                      <span class=" invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <label for="email" class="active">Masukkan Email Anda..</label>
                    </div>

                    <div class="md-form">
                      <i class="fa fa-user prefix white-text"></i>
                      <input type="text" name="nama_lengkap" id="nama_lengkap"
                      class="white-text form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}"
                      required autocomplete="nama_lengkap">
                      @error('nama_lengkap')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <label for="nama_lengkap">Masukkan Nama Lengkap Anda..</label>
                    </div>

                    <div class="md-form">
                      <i class="fas fa-user-circle prefix white-text active"></i>
                      <input type="text" name="username" readonly id="username"
                      class="white-text form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                      required autocomplete="username">
                      @error('username')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <label for="username" id="lbluser">Masukkan Username..</label>
                    </div>

                    <div class="md-form">
                      <i class="fas fa-phone prefix white-text active"></i>
                      <input type="number" name="no_telepon" id="no_telepon"
                      class="white-text form-control @error('no_telepon') is-invalid @enderror" value="{{ old('no_telepon') }}"
                      required autocomplete="no_telepon">
                      @error('no_telepon')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <label for="no_telepon">Masukkan No. Telepon..</label>
                    </div>

                    <div class="md-form">
                      <i class="fa fa-lock prefix white-text active"></i>
                      <input type="password" name="password" id="password"
                      class="white-text form-control @error('password') is-invalid @enderror" required
                      autocomplete="new-password">
                      @error('password')
                      <span class=" invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <label for="password">Masukkan Password..</label>
                    </div>

                    <div class="md-form">
                      <i class="fa fa-lock prefix white-text active"></i>
                      <input type="password" name="password_confirmation" required autocomplete="new-password"
                      id="kpw" class="white-text form-control @error('password') is-invalid @enderror">
                      @error('password')
                      <span class=" invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <label for="kpw">Konfirmasi Password..</label>
                    </div>

                    <div class="text-center mt-4">
                      <button type="submit" class="btn btn-primary mb-3">Daftar </button>
                      <p class="white-text">Sudah Punya Akun? 
                        <a href="{{url('login')}}">Silahkan Login</a>
                      </p>
                      <hr class="hr-light mb-3 mt-4">
                      {{-- <div class="inline-ul text-center d-flex justify-content-center">
                        <a class="p-2 m-2 tw-ic">
                          <i class="fab fa-twitter white-text"></i>
                        </a>
                        <a class="p-2 m-2 li-ic">
                          <i class="fab fa-linkedin-in white-text"> </i>
                        </a>
                        <a class="p-2 m-2 ins-ic">
                          <i class="fab fa-instagram white-text"> </i>
                        </a>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <!--/.Form-->
              </form>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
        <!-- Content -->
      </div>
      <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->
  </header>
  <!-- Main navigation -->
  <!--Main Layout-->
  <!--Main Layout-->
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{('mdbpro/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{('mdbpro/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{('mdbpro/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{('mdbpro/js/mdb.min.js')}}"></script>
  <script>
    new WOW().init();

    $(document).ready(function() {
      $('#email').on('input', function(){
        var email = $(this).val();
        var username = email.split('@');
        $('#username').val(username[0]);

        if($('#username').val(username[0])){
          $('#lbluser').addClass('active');
        }
      });
    });
  </script>
</body>

</html>