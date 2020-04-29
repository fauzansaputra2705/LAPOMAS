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
                                <li class="list-inline-item">Daftar Pengaduan</li>
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
    ajax: "{{ route('admin.jsondaftarlaporan') }}",
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

@foreach ($laporan as $lp)
<!-- Full Height Modal Right -->
<div class="modal fade right" id="viewlaporan{{ $lp->id_laporan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-left" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Isi Laporan</p>
          {{ $lp->isi_laporan }}
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>
<!-- Full Height Modal Right -->
@endforeach



@foreach ($laporan as $lp)
<!-- Modal -->
<div class="modal fade" id="verifikasilaporan{{ $lp->id_laporan }}" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('admin/daftar-pengaduan/tanggapan') }}" method="POST" >
      <div class="modal-body">
        @csrf
        
        <input type="hidden" name="laporan_id" id="laporan_id" value="{{ $lp->id_laporan }}">
        <input type="hidden" name="user_id" value="0">
        <input type="hidden" name="tanggal_tanggapan" value="{{ date('Y-m-d') }}">
        <input type="hidden" name="tanggapan" value="-">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit{{ $lp->id_laporan }}" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tolaklaporan{{ $lp->id_laporan }}" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tolak Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" >
      <div class="modal-body">
        @csrf
        
        <input type="hidden" name="laporan_id" id="laporan_id" value="{{ $lp->id_laporan }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="tanggal_tanggapan" value="{{ date('Y-m-d') }}">
        <label for="">Tanggapan Tolak</label>
        <input type="text" name="tanggapan" class="form-control" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submittolak{{ $lp->id_laporan }}" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $('#submit{{ $lp->id_laporan }}').click(function() {
      $.ajax({
        url: '{{ url('admin/daftar-pengaduan/updatelaporan') }}'+'/'+ {{ $lp->id_laporan }},
        type: 'POST',
        data: {_method: 'PUT', _token: csrf_token, status_laporan: 'proses'},
      });
    });
  });

  $(document).ready(function() {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $('#submittolak{{ $lp->id_laporan }}').click(function() {
      $.ajax({
        url: '{{ url('admin/daftar-pengaduan/updatelaporan') }}'+'/'+ {{ $lp->id_laporan }},
        type: 'POST',
        data: {_method: 'PUT', _token: csrf_token, status_laporan: 'tolak'},
      });
    });
  });
</script>
@endforeach