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
                <li class="list-inline-item">Daftar Instansi</li>
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
          <table class="table table-striped" id="daftar_instansi">
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Induk Instansi</th>
                <th scope="col">Nama Instansi</th>
                <th scope="col">Tipe Instansi</th>
                {{-- <th scope="col">Action</th> --}}
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
 
    
    var table = $('#daftar_instansi').DataTable({
        processing: true,
        serverSide: true,
        // "scrollX" : true,
        ajax: "{{ route('json.daftarinstansi') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'induk_instansi', name: 'induk_instansi'},
            {data: 'nama_instansi', name: 'nama_instansi'},
            {data: 'tipe_instansi', name: 'tipe_instansi'},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
</script>