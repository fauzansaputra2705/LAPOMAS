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
                <li class="list-inline-item">Daftar Petugas</li>
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
        <div class="col-md-12">

          @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          
          @if (Auth::user()->role == "superadmin")
          <a href="{{ url('superadmin/daftar-petugas/create') }}" class="btn btn-primary mb-lg-3">Create</a>
          @elseif (Auth::user()->role == "admin")
          <a href="{{ url('admin/daftar-petugas/create') }}" class="btn btn-primary mb-lg-3">Create</a>
          @endif

          <table class="table table-striped" id="daftar_petugas">
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Username</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Action</th>
                {{-- <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th> --}}
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END STATISTIC-->

<script type="text/javascript">
  var table;

  table = $('#daftar_petugas').DataTable({
    processing: true,
    serverSide: true,
    "scrollX" : true,
    ajax: "{{ url(Auth::user()->role.'/json/daftarpetugas') }}",
    columns: [
    {data: 'id', name: 'id'},
    {data: 'nama_lengkap', name: 'nama_lengkap'},
    {data: 'username', name: 'username'},
    {data: 'no_telepon', name: 'no_telepon'},
    {data: 'email', name: 'email'},
    {data: 'password', name: 'password'},
    {data: 'image', name: 'image'},
    {data: 'nama_kategori', name: 'nama_kategori'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    dom: 'Bfrtip',
      buttons: [
      'excel','pdf'
    ]
  });

  // function hapus(id){
  //   Swal.fire(
  //     'Good job!',
  //     'You clicked the button!',
  //     'success'
  //     )
  // }

  function hapus(id){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    Swal.fire({
      title: 'Apakah Kamu Yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya, Hapus!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url : "{{ url(Auth::user()->role.'/daftar-petugas') }}" + '/delete/' + id,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            table.ajax.reload();
            Swal.fire(
             'Dihapus!',
             'Akun Petugas Telah Dihapus.',
             'success'
             )
          },
          error : function () {
            Swal.fire(
              'Oops...',
              'Gagal Dihapus',
              'error'
              )
          }
        });
      }
    })
  }
</script>