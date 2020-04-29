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
                                <li class="list-inline-item">Laporan Pengaduan</li>
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

          {{-- @if (Auth::user()->role == "superadmin")
          <a href="{{ url('superadmin/daftar-petugas/create') }}" class="btn btn-primary mb-lg-3">Create</a>
          @elseif (Auth::user()->role == "admin")
          <a href="{{ url('admin/daftar-petugas/create') }}" class="btn btn-primary mb-lg-3">Create</a>
          @endif --}}

          <table class="table table-striped" id="daftar_petugas" width="100%">
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Pelapor</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tanggal Laporan</th>
                <th scope="col">Status Laporan</th>
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

<script type="text/javascript">
  var table;

  table = $('#daftar_petugas').DataTable({
    processing: true,
    serverSide: true,
    "scrollX" : true,
    ajax: "{{ route('petugas.jsondaftarlaporan') }}",
    columns: [
    {data: 'id_laporan', name: 'id_laporan'},
    {data: 'nama_lengkap', name: 'nama_lengkap'},
    {data: 'nama_kategori', name: 'nama_kategori'},
    {data: 'tanggal_laporan', name: 'tanggal_laporan'},
    {data: 'status_laporan', name: 'status_laporan'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
});
</script>


<script>
  function selesai(id){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: '{{ url('petugas/daftar-pengaduan/updatelaporan') }}'+'/'+id,
      type: 'POST',
      data: {_method: 'PUT', _token: csrf_token, status_laporan: 'selesai'},
    })
      location.replace("{{ url('petugas/daftar-pengaduan') }}")
  }
</script>

