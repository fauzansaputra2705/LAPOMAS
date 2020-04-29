<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content='#222' name='theme-color'/>
  <link rel="icon" type="image/png" sizes="16x16" href="">
  <title>Aplikasi LAPOMAS</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Your custom styles (optional) -->
  <!-- MDBootstrap Datatables  -->
  <link href="{{asset('mdbpro/css/addons-pro/stepper.min.css')}}" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('mdbpro/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('mdbpro/css/mdb.css')}}" rel="stylesheet">
  <link href="{{asset('mdbpro/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('dashboard/select2/select2.min.css') }}" media="all">
  <link rel="stylesheet" href="{{ asset('dashboard/select2/select2-bootstrap4.css') }}" media="all">
  <link rel="stylesheet" href="{{ asset('dashboard/select2/select2-material.css') }}" media="all">
  <script type="text/javascript" src="{{asset('mdbpro/js/jquery-3.4.1.min.js')}}"></script>
  <link rel="stylesheet" href="{{ asset('mdbpro/css/addons/datatables.css') }}">
  <script src="{{ asset('mdbpro/js/addons/datatables.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('dashboard/sweetalert2/sweetalert2.min.css') }}" media="all">

  <link rel="stylesheet" href="{{ asset('mdbpro/css/addons-pro/chat.css') }}">
  <link rel="stylesheet" href="{{ asset('mdbpro/css/addons-pro/chat.min.css') }}">
</head>

<body class="fixed-sn light-skin">

  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav ">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="fas fa-bars"></i></a>
      </div>
      <!-- Breadcrumb-->
      <div class="breadcrumb-dn mr-auto">
        <p><b>Aplikasi LAPOMAS</b></p>
      </div>
      <ul class="nav navbar-nav nav-flex-icons ml-auto">
        {{-- <li class="nav-item">
          <a class="nav-link"><i class="fas fa-envelope"></i> <span
            class="clearfix d-none d-sm-inline-block"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"><i class="fas fa-comments"></i> <span
              class="clearfix d-none d-sm-inline-block"></span></a>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link waves-effect waves-black">
               <i class="fas fa-envelope"></i>
             </a>
           </li> --}}

           <li class="nav-item dropdown avatar dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">

            <img src="{{asset('images/'.Auth::user()->image)}}" width="35px" height="35px" class="rounded-circle z-depth-0 mr-2"
            alt="avatar image">
            {{-- <strong>{{Auth::user()->name}}</strong> --}}
          </a>
          <div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style="">

            @php
            $id = Auth::user()->id;
            @endphp    
            <a class="dropdown-item" href="{{ url('user/profile/'.$id) }}">Profil</a>
            <a class="dropdown-item" href="/logout"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
         </form>
       </div>
     </li>
   </ul>
 </nav>
 <!-- /.Navbar -->
</header>
<!--/.Double navigation-->

@include('layouts.sidebar')

<!--Main layout-->
<main>
  <div class="container">
    @include('layouts.content')
  </div>

</main>
@include('layouts.footer')