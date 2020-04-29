 BREADCRUMB-->
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
                                <li class="list-inline-item active"><a href="{{ route('petugas.pengaduan') }}">Laporan Pengaduan</a></li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Chat</li>
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
        <div class="card grey lighten-3 chat-room">
  <div class="card-body">

    <!-- Grid row -->
    <div class="row px-lg-2 px-2">

      <!-- Grid column -->
      <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

        <div class="chat-message">

          <ul class="list-unstyled chat">
            @foreach ($tanggapan as $tg)
            <li class="d-flex justify-content-between mb-4">
              <div class="chat-body white p-3 z-depth-1">
                <div class="header">
                  <strong class="primary-font">{{ $tg->nama_lengkap }}</strong>
                  {{-- <small class="pull-right text-muted"><i class="far fa-clock"></i> 13 mins ago</small> --}}
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  {{ $tg->tanggapan }}
                </p>
              </div>
              <img src="{{ asset('images/'.$tg->image) }}" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
            </li>
            @endforeach
            <li class="white">
            <form action="{{ url('petugas/daftar-pengaduan/chat/store')}}" method="POST">
                @csrf
                <input type="hidden" name="laporan_id" value="{{ $laporan_id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="tanggal_tanggapan" value="{{ date('Y-m-d') }}">
                 <div class="form-group basic-textarea">
                    <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" name="tanggapan" placeholder="Type your message here..."></textarea>
                </div>
            </li>
                <button type="submit" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Send</button>
            </form>
          </ul>

        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
</div>
    </div>
</div>
</section>
<!-- END STATISTIC