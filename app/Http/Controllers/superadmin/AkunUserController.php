<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use DataTables;
use File;
use App\User;

class AkunUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Daftar User | SuperAdmin";
        $data['layout'] = "superadmin.user.daftar_user";
        $data['aktif'] = "user";
        return view ('layouts_dashboard.header', $data);
    }

    public function json()
    {
        $user = DB::table('users')->where('role','user')->get();

        return DataTables::of($user)
        ->addColumn('image', function ($user){
            return '<img src="'.asset('images/'.$user->image).'" alt="">';
        })
        // ->addColumn('action', function ($user){
        //     return '<a href="'.url('superadmin/daftar-admin/'.$user->id.'/edit').'" class="btn btn-warning"><i class="fas fa-user-edit text-white"></i></a>'
        //     .'<button type="button" onclick="hapus('.$user->id.')" class="btn btn-danger"><i class="fas fa-trash text-white"></i></button>';
        // })
        ->rawColumns(['image'/*,'action'*/])
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
        //
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
