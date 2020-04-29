<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use DataTables;
use App\Laporan;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Dashboard | Admin";
        $data['layout'] = "admin.index";
        $data['aktif'] = "dashboard";
        return view('layouts_dashboard.header', $data);
    }

    public function pengaduan()
    {
        $data['title'] = "Daftar Pengaduan | Admin";
        $data['layout'] =  "admin.pengaduan";
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
        ->get();

        return DataTables::of($laporan)
        ->addColumn('action', function ($laporan){
            return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewlaporan'.$laporan->id_laporan.'"><i class="fas fa-eye text-white"></i></button>';
        })
        ->addColumn('status_laporan', function ($laporan)
        {
            if ($laporan->status_laporan == '0') {
                return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifikasilaporan'.$laporan->id_laporan.'">Verifikasi</button><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tolaklaporan'.$laporan->id_laporan.'">Tolak</button>';
            }elseif ($laporan->status_laporan == 'proses') {
               return 'Di Proses Oleh Petugas';
            }elseif ($laporan->status_laporan == 'ga_ditanggapi') {
                return '';
            }elseif ($laporan->status_laporan == 'tolak') {
                return 'Di Tolak Oleh Admin';
            }
        })
        ->rawColumns(['action','status_laporan'])
        ->make(true);
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
