<?php

namespace App\Http\Controllers;

use App\UserData;
use Illuminate\Http\Request;

use App\Kategori;
use App\User;
use DB;
Use DataTables;
use Auth;
use QrCode;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function penggunaan()
    {
        $data['layout'] = 'user.cara_penggunaan';
        return view('layouts.header',$data);
    }


    public function pengaduan()
    {
        $data['layout'] = 'user.pengaduansaya';
        return view('layouts.header',$data);
    }

    public function jsonpengaduan()
    {
        $laporan = DB::table('laporans')
        ->join('kategoris', 'kategoris.id_kategori', '=', 'laporans.kategori_id')
        ->join('users', 'users.id', '=', 'laporans.user_id')
        ->select('laporans.*','kategoris.nama_kategori', 'users.nama_lengkap')
        ->where('user_id',Auth::user()->id)
        ->get();

        return DataTables::of($laporan)
        ->addColumn('action', function ($laporan){
            return '<a href="'.url('user/laporan/detail/'.$laporan->id_laporan.'').'" class="btn btn-primary"><i class="fas fa-eye text-white"></i></a>';
        })
        ->addColumn('status_laporan', function ($laporan)
        {
            if ($laporan->status_laporan == '0') {
                return 'Belum Diverifikasi Oleh Admin';
            }elseif ($laporan->status_laporan == 'proses') {
               return 'Di Proses Oleh Petugas';
            }elseif ($laporan->status_laporan == 'ga_ditanggapi') {
                return '';
            }elseif ($laporan->status_laporan == 'tolak') {
                return 'Ditolak Oleh Admin';
            }
        })
        ->rawColumns(['action','status_laporan'])
        ->make(true);
    }

    public function getprofile($id)
    {
        
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
     * @param  \App\user_data  $user_data
     * @return \Illuminate\Http\Response
     */
    public function show(user_data $user_data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_data  $user_data
     * @return \Illuminate\Http\Response
     */
    public function edit(user_data $user_data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_data  $user_data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_data $user_data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_data  $user_data
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_data $user_data)
    {
        //
    }
}
