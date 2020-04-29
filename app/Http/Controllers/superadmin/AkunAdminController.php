<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use DataTables;
use File;
use App\User;
use App\Kategori;

class AkunAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Daftar Admin | SuperAdmin";
        $data['layout'] = "superadmin.admin.daftar_admin";
        $data['aktif'] = "admin";
        return view ('layouts_dashboard.header', $data);
    }

    public function json()
    {
        $admin = DB::table('users')
        ->join('kategoris', 'kategoris.id_kategori', '=', 'users.kategori_id')
        ->select('users.*','kategoris.nama_kategori')
        ->where('role','admin')
        ->get();

        return DataTables::of($admin)
        ->addColumn('image', function ($admin){
            return '<img src="'.asset('images/'.$admin->image).'" alt="">';
        })
        ->addColumn('nama_kategori', function ($admin)
        {
            return $admin->nama_kategori;
        })
        ->addColumn('action', function ($admin){
            return '<a href="'.url('superadmin/daftar-admin/'.$admin->id.'/edit').'" class="btn btn-warning"><i class="fas fa-user-edit text-white"></i></a>'
            .'<button type="button" onclick="hapus('.$admin->id.')" class="btn btn-danger"><i class="fas fa-trash text-white"></i></button>';
        })
        ->rawColumns(['image','nama_kategori','action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Create Admin | SuperAdmin";
        $data['layout'] = "superadmin.admin.form";
        $data['aktif'] = "admin";
        $data['kategori'] = Kategori::all();
        return view('layouts_dashboard.header',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_lengkap' => 'required',
                'email' => 'required|email|unique:users',
                'username' => 'required',
                'no_telepon' => 'required|max:13',
                'kategori_id' => 'required',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // 'password' => 'required|min:6'
            ],
        );
        // $imageName = time().'.'.$request->image->extension();
        // $request->image->move(public_path('images'),$imageName);
        $input = [
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'username' => $request->username,
            'no_telepon' => $request->no_telepon,
            'image' => 'logo/imageadmin.png',
            // 'password' => bcrypt($request->password),
            'password' => bcrypt('admin@123'),
            'role' => 'admin',
            'kategori_id' => $request->kategori_id,
        ];
        User::create($input);
        return redirect()->route('superadmin.daftar-admin')->with('success', 'Akun Admin Sukses Di Buat');
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
        $data['title'] = "Edit Admin | SuperAdmin";
        $data['layout'] = "superadmin.admin.form";
        $data['aktif'] = "admin";
        $data['dataadmin'] = User::find($id);
        $data['kategori'] = Kategori::all();
        return view('layouts_dashboard.header',$data);
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
        $iduser = User::find($id);
        $request->validate(
            [
                'nama_lengkap' => 'required',
                'email' => 'required|email|unique:users,email,'.$iduser->id,
                'username' => 'required',
                'no_telepon' => 'required|max:13',
                'kategori_id' => 'required',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // 'password' => 'required|min:6'
            ],
        );

        // $imageName = time().'.'.$request->image->extension();

        // $request->image->move(public_path('images'),$imageName);

        $input = [
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'username' => $request->username,
            'no_telepon' => $request->no_telepon,
            // 'image' => $imageName,
            'image' => 'logo/imageadmin.png',
            // 'password' => bcrypt($request->password),
            'password' => bcrypt('admin@123'),
            'role' => 'admin',
            'kategori_id' => $request->kategori_id,
        ];
        $gambar = $iduser->image;
        $this->deleteimage($gambar);
        $iduser->update($input);
        return redirect()->route('superadmin.daftar-admin')->with('success', 'Akun Admin Sukses Di Edit');
    }

    public function deleteimage($gambar)
    {
        if ($gambar !== "logo/imageadmin.png") {
            File::delete('images/'.$gambar);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return response()->json([
            'success' => true
        ]);
    }
}
