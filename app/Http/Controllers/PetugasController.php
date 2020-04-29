<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Tanggapan;
use DB;
use DataTables;
use Auth;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Dashboard | Petugas";
        $data['layout'] = "petugas.index";
        $data['aktif'] = "dashboard";
        return view('layouts_dashboard.header',$data);
    }

    public function pengaduan()
    {
        $data['title'] = "Daftar Pengaduan | Petugas";
        $data['layout'] =  "petugas.pengaduan";
        $data['aktif'] = "pengaduan";
        $data['laporan'] = Laporan::all();
        // $data['user'] = User::where('kategori_id',Auth::user()->kategori_id)->where('role','petugas')->get();
        return view('layouts_dashboard.header',$data);
    }

    public function json()
    {
        $laporan = DB::table('laporans')
        ->join('kategoris', 'kategoris.id_kategori', '=', 'laporans.kategori_id')
        ->join('users', 'users.id', '=', 'laporans.user_id')
        ->select('laporans.*','kategoris.nama_kategori', 'users.nama_lengkap')
        ->where('laporans.kategori_id',Auth::user()->kategori_id)
        ->where('status_laporan','proses')
        ->get();

        return DataTables::of($laporan)
        ->addColumn('action', function ($laporan){
            return '<a href="'.url("petugas/daftar-pengaduan/chat/$laporan->id_laporan").'" class="btn btn-primary"><i class="fas fa-edit text-white"></i></a>';
        })
        ->addColumn('status_laporan', function ($laporan)
        {
            if ($laporan->status_laporan == '0') {
                return '';
            }elseif ($laporan->status_laporan == 'proses') {
               return '<button type="button" onclick="selesai('.$laporan->id_laporan.')" class="btn btn-primary">selesai</button>';
            }elseif ($laporan->status_laporan == 'ga_ditanggapi') {
                return '';
            }elseif ($laporan->status_laporan == 'tolak') {
                return 'Di Tolak Oleh Admin';
            }
        })
        ->rawColumns(['action','status_laporan'])
        ->make(true);
    }

    public function chat($id)
    {
        $data['tanggapan'] = DB::table('tanggapans')
        ->join('laporans','laporans.id_laporan','=','tanggapans.laporan_id')
        ->join('users','users.id','=','tanggapans.user_id')
        ->select('tanggapans.*','users.nama_lengkap','users.image')
        ->where('laporan_id',$id)
        ->get();
        $data['laporan_id'] = $id;
        $data['title'] = 'Tanggapan | Petugas';
        $data['layout'] = 'petugas.chat';
        $data['aktif'] = 'pengaduan';
        return view ('layouts_dashboard.header',$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updatelaporan(Request $request, $id)
    {
        $laporan = Laporan::find($id);
        $laporan->update([
            'status_laporan' => $request->status_laporan
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
