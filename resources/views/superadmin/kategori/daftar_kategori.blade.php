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
                <li class="list-inline-item">Daftar Kategori</li>
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
          <button onclick="tambah()" class="btn btn-primary mb-lg-3 text-white">Create</button>
          <table class="table table-striped" id="daftar_kategori">
            <thead>
              <tr>
                <th scope="col" width="auto">NO</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Action</th>
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

@include('superadmin.kategori.form')

<script type="text/javascript">
  var table;
  var pesan;
  var url;

  table = $('#daftar_kategori').DataTable({
    processing: true,
    serverSide: true,
        // "scrollX" : true,
        ajax: "{{ route('json.daftarkategori') }}",
        columns: [
        {data: 'id_kategori', name: 'id_kategori'},
        {data: 'nama_kategori', name: 'nama_kategori'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
          });

  function tambah() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#modal-form').modal('show');
    $('#modal-form form')[0].reset();
    $('.modal-title').text('Tambah Kategori');
  }

  function edit(id) {
    save_method = 'edit';
    $('input[name=_method]').val('PUT');
    $('#modal-form form')[0].reset();
    $.ajax({
      url: "{{ url('superadmin/daftar-kategori') }}" + '/' + id + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('#modal-form').modal('show');
        $('.modal-title').text('Edit Kategori');

        $('#id').val(data.id_kategori);
        $('#nama_kategori').val(data.nama_kategori);
      },
      error : function() {
        alert("Nothing Data");
      }
    });
  }

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
          url : "{{ url('superadmin/daftar-kategori') }}" + '/delete/' + id,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            table.ajax.reload();
            Swal.fire(
             'Dihapus!',
             'Kategori Berhasil Dihapus.',
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

  $(function(){
    $('#modal-form form').validator().on('submit', function (e) {
      if (!e.isDefaultPrevented()){
        var id = $('#id').val();
        if (save_method == 'add'){
          pesan = "Daftar Kategori Telah Di Tambah"; 
          url = "{{ url('superadmin/daftar-kategori/create') }}";
        }else{
          pesan = "Daftar Kategori Telah Di Edit"; 
          url = "{{ url('superadmin/daftar-kategori') . '/edit/' }}" + id;
        } 

        $.ajax({
          url : url,
          type : "POST",
          // data : $('#modal-form form').serialize(),
          data: new FormData($("#modal-form form")[0]),
          contentType: false,
          processData: false,
          success : function(data) {
            $('#modal-form').modal('hide');
            table.ajax.reload();
            Swal.fire(
             'Berhasil!',
             pesan,
             'success'
             )
          },
          error : function(data){
            Swal.fire(
              'Oops...',
              'Gagal!!!!',
              'error'
              )
          }
        });
        return false;
      }
    });
  });
</script>


