<div class="jumbotron">
	<div class="row">
		<div class="col-md-11">
			<div class="row">
				<div class="col-md-1">
					<img class="rounded-circle" alt="foto" width="50" src="{{ asset('images/'.Auth::user()->image) }}" data-holder-rendered="true">
				</div>
				<div class="col-md-4">
					<span style="font-size: 14px;" class="text-primary">{{ Auth::user()->nama_lengkap }}</span>
				</div>
				<div class="col-md-4">
					@if ($laporan->status_laporan == '0')
					<span style="font-size: 14px;" class="text-danger"><i class="fas fa-exclamation-circle"></i> Belum Terverifikasi</span>
					@elseif($laporan->status_laporan == 'tolak')
					<span style="font-size: 14px;" class="text-danger"><i class="fas fa-exclamation-circle"></i> DITOLAK</span>
					@else
					<span style="font-size: 14px;" class="text-success"><i class="fas fa-check-circle"></i> Sudah Terverifikasi</span>
					@endif
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-11">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-11">
					<p>Kategori : {{ $laporan->nama_kategori }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-11">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-11">
					<p>{{ $laporan->isi_laporan }}</p>
					@if ($laporan->foto !== '-' )
					<img src="{{ asset('images/'.$laporan->foto) }}" alt="thumbnail" class="img-thumbnail" style="width: 200px">
					@else
					{{-- <p>Tidak ada foto</p> --}}
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-11">
			<div class="row">
				<div class="col-md-1">
				</div>
				@if ($laporan->status_laporan == 'proses' || $laporan->status_laporan == 'tolak')
				@else
				<div class="col-md-4">
					<a href="{{ url('user/laporan/detail/'.$laporan->id_laporan.'/edit') }}"><i class="fas fa-edit"></i> Ubah Laporan</a>
				</div>
				<div class="col-md-4 text-primary">
					<a onclick="hapus({{ $laporan->id_laporan }},'{{ $laporan->foto }}')"><i class="fas fa-trash"></i> Hapus Laporan</a>
				</div>
				<div class="col-md-3">
				</div>

				@endif
			</div>
			<hr>
		</div>
	</div>
	@if ($laporan->status_laporan == '0')
	<div class="alert alert-primary mt-3" role="alert">
		<div class="row">
			<div class="col-md-1">
				<span style="font-size: 25px"><b><i class="far fa-clock"></i></b></span>
			</div>
			<div class="col-md-11">
				<span style="font-size: 25px"><b>Laporan ini Menunggu verifikasi Admin!</b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-11">
				<p>Proses ini memerlukan waktu 3 hari kerja untuk memverifikasi dan mendisposisikan kepada instansi berwenang</p>
			</div>
		</div>
	</div>

	@elseif($laporan->status_laporan == "proses")
	<div class="alert alert-primary mt-3" role="alert">
		<div class="row">
			<div class="col-md-1">
				<span style="font-size: 25px"><b><i class="far fa-clock"></i></b></span>
			</div>
			<div class="col-md-11">
				<span style="font-size: 25px"><b>Laporan ini akan menindaklanjuti dan membalas laporan anda!</b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-11">
				<p>Dalam 5 hari, petugas akan menindaklanjuti dan membalas laporan Anda</p>
			</div>
		</div>
	</div>

	@elseif($laporan->status_laporan == 'tolak')
	<div class="alert alert-primary mt-3" role="alert">
		<div class="row">
			<div class="col-md-1">
				<span style="font-size: 25px"><b><i class="far fa-clock"></i></b></span>
			</div>
			<div class="col-md-11">
				<span style="font-size: 25px"><b>Laporan Anda Ditolak Oleh Admin!</b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-11">
				<p>Laporan anda ditolak</p>
			</div>
		</div>
	</div>
	@else
	<div class="alert alert-primary mt-3" role="alert">
		<div class="row">
			<div class="col-md-1">
				<span style="font-size: 25px"><b><i class="far fa-clock"></i></b></span>
			</div>
			<div class="col-md-11">
				<span style="font-size: 25px"><b>Laporan ini akan beri tanggapan laporan anda!</b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-11">
				<p>Dalam 10 hari, Anda dapat menanggapi kembali balasan yang diberikan oleh instansi</p>
			</div>
		</div>
	</div>

	@endif

</div>

@if ($laporan->status_laporan == "tolak" || $laporan->status_laporan == 'proses')

<div class="card grey lighten-3 chat-room">
  <div class="card-body">

    <!-- Grid row -->
    <div class="row px-lg-2 px-2">

      <!-- Grid column -->
      <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

        <div class="chat-message">

          <ul class="list-unstyled chat">
          	@foreach ($tanggapan as $tg)
            <li class="d-flex justify-content-between mb-4 pb-3">
              <img src="{{ asset('images/'.$tg->image) }}" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
              <div class="chat-body white p-3 ml-2 z-depth-1">
                <div class="header">
                  <strong class="primary-font">{{ $tg->nama_lengkap }}</strong>
                  {{-- <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins ago</small> --}}
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  {{ $tg->tanggapan }}
                </p>
              </div>
            </li>
            {{-- <li class="white">
            <form action=""></form>
              <div class="form-group basic-textarea">
                <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>
              </div>
            </li>
            <button type="submit" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Send</button> --}}
          	@endforeach
          </ul>

        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
</div>
@endif




<script>
	function hapus(id,gambar){
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
          url : "{{ url('user/laporan/detail') }}" + '/' + id + '/' + gambar,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            
            Swal.fire(
             'Dihapus!',
             'Laporan Telah Dihapus.',
             'success'
             )
            window.location.href = "{{ url('user/pengaduan-saya') }}";
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