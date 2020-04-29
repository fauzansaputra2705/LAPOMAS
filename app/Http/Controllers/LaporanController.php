<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\Kategori;
use Illuminate\Http\Request;

use DB;
use Auth;
use File;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['layout'] = 'user.form_laporan';
        $data['kategori'] = Kategori::all();
        return view('layouts.header',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasfile('foto')) {
            $request->validate([
                'isi_laporan' => 'required',
                'kategori_id' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$imageName);
        }else {
            $request->validate([
                'isi_laporan' => 'required',
                'kategori_id' => 'required',
                // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);
            $imageName = '-';
        }

        $input = [
            'kategori_id' => $request->kategori_id,
            'user_id' => $request->user_id,
            'isi_laporan' => $request->isi_laporan,
            'tanggal_laporan' => $request->tanggal_laporan,
            'foto' => $imageName,
            'status_laporan' => '0',
        ];

        $data = [
            'phone' => Auth::user()->no_telepon, // Receivers phone
            'body' => 'Terima Kasih Telah Melapor di LAPOMAS!', // Message
        ];
        $json = json_encode($data); // Encode data to JSON
        // URL for request POST /message
        $url = 'https://eu9.chat-api.com/instance121289/message?token=9edyfgmov0jd0upq';
        // Make a POST request
        $options = stream_context_create(['http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $json
        ]
        ]);
        // Send a request
        $result = file_get_contents($url, false, $options);

        Laporan::create($input);
        return redirect()->route('user.pengaduansaya');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['laporan'] = DB::table('laporans')
        ->join('kategoris', 'kategoris.id_kategori', '=', 'laporans.kategori_id')
        ->join('users', 'users.id', '=', 'laporans.user_id')
        ->select('laporans.*','kategoris.nama_kategori', 'users.nama_lengkap', 'users.image')
        ->where('user_id',Auth::user()->id)
        ->where('id_laporan',$id)
        ->first();

        $data['tanggapan'] = DB::table('tanggapans')
        ->join('laporans', 'laporans.id_laporan', '=', 'tanggapans.laporan_id')
        ->join('users','users.id','=','tanggapans.user_id')
        ->select('tanggapans.*','users.nama_lengkap','users.image')
        ->where('laporan_id',$id)
        ->get();
        $data['layout'] = 'user.laporandetail'; 
        return view('layouts.header',$data);
    }

    public function jsongetchat()
    {
        
    }

    public function jsonstorechat(Request $request)
    {
        Laporan::all($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['laporan'] = DB::table('laporans')
        ->join('kategoris', 'kategoris.id_kategori', '=', 'laporans.kategori_id')
        ->join('users', 'users.id', '=', 'laporans.user_id')
        ->select('laporans.*','kategoris.nama_kategori', 'users.nama_lengkap')
        ->where('user_id',Auth::user()->id)
        ->where('id_laporan',$id)
        ->first();
        $data['kategori'] = Kategori::all();
        $data['layout'] = 'user.form_laporan';
        return view('layouts.header',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!empty($request->foto)) {
            $request->validate([
                'isi_laporan' => 'required',
                'kategori_id' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$imageName);
        }else {
            $request->validate([
                'isi_laporan' => 'required',
                'kategori_id' => 'required',
                // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);
            $imageName = '-';
        }

        $input = [
            'kategori_id' => $request->kategori_id,
            'user_id' => $request->user_id,
            'isi_laporan' => $request->isi_laporan,
            'tanggal_laporan' => $request->tanggal_laporan,
            'foto' => $imageName,
            'status_laporan' => '0',
        ];

        $laporan = Laporan::find($id);
        $gambar = $laporan->foto;
        $this->deleteimage($gambar);

        $laporan->update($input);

        return redirect('/user/laporan/detail/'.$id.'');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $gambar)
    {
        $this->deleteimage($gambar);

        Laporan::destroy($id);

        return response()->json([
            'success' => true
        ]);
    }
    
    public function deleteimage($gambar)
    {
        if ($gambar !== "logo/imageadmin.png") {
            File::delete('images/'.$gambar);
        }
    }
}
