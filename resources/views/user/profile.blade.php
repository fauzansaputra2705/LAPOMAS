<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb primary-color-dark">
          <li class=""><a class="white-text" href="{{ route('user.index') }}">Home</a><i class="fas fa-angle-right mx-2" aria-hidden="true"></i>
          </li>
          <li class="active"><a class="white-text" href="#">Form Profile</a></li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <!-- Table with panel -->
      <br>
      <div class="card card-cascade narrower">

        <!--Card image-->
        <div
        class="view view-cascade gradient-card-header primary-color-dark narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <a href="" class="white-text mx-3">Table Profile</a>

        <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
          <i class="fas fa-info-circle mt-0"></i>
        </button>

      </div>
      <!--/Card image-->

      <div class="card-body px-lg-5 pt-0">

        {!! QrCode::size(250)->generate('Nama Lengkap = '.$user->nama_lengkap.' | , Email = '.$user->email.' | , Username = '.$user->username.' | , No Telepon  '.$user->no_telepon.' '); !!}

        <!-- Form
        <form role="form" action="" method="POST" class="text-center"
          style="color: #757575;" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="md-form">
            <input name="id" type="hidden" value="" id="inputMDEx" class="form-control">
            <input name="role" type="hidden" value="" id="inputMDEx" class="form-control">
        
          </div>
          <div class="md-form">
            <input name="name" type="text" value="" id="inputMDEx" class="form-control">
            <label for="materialSubscriptionFormEmail">Nama Pengguna</label>
          </div>
          <div class="md-form">
            <input name="nisn" type="number" value="" id="inputMDEx" class="form-control">
            <label for="materialSubscriptionFormEmail">Nisn</label>
          </div>
          <div class="md-form">
            <input name="email" type="text" value="" id="inputMDEx" class="form-control">
            <label for="materialSubscriptionFormEmail">Email</label>
          </div>
          <input name="password" type="hidden" value="" id="inputMDEx" class="form-control">
          Name
          <div class="md-form">
            <div class="file-field">
              <div class="btn primary-color btn-sm float-left">
                <span class="white-text"><i class="fas fa-cloud-upload-alt mr-2 white-text"
                  aria-hidden="true"></i>Pilih File</span>
                  <input name="foto" type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload foto..">
                </div>
              </div>
            </div>
        
        
            Send button
            <button class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect"
            type="submit">Edit</button>
        
          </form>
          Form -->


        </div>

      </div>
      <!-- Table with panel -->
    </div>
  </div>
</div>