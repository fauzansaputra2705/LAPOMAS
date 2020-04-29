<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use DataTables;
use File;
use App\User;
use App\Kategori;
use Auth;

class AkunPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == "superadmin") {
            $data['title'] = "Daftar Petugas | SuperAdmin";
        }elseif(Auth::user()->role == "admin"){
            $data['title'] = "Daftar Petugas | Admin";
        }
        $data['layout'] = "daftar_petugas";
        $data['aktif'] = "petugas";
        return view ('layouts_dashboard.header', $data);
    }

    public function json()
    {
        if (Auth::user()->role == "superadmin") {
            $petugas = DB::table('users')
            ->join('kategoris', 'kategoris.id_kategori', '=', 'users.kategori_id')
            ->select('users.*','kategoris.nama_kategori')
            ->where('role','petugas')
            ->get();
        }elseif (Auth::user()->role == "admin") {
            $petugas = DB::table('users')
            ->join('kategoris', 'kategoris.id_kategori', '=', 'users.kategori_id')
            ->select('users.*','kategoris.nama_kategori')
            ->where('role','petugas')
            ->where('kategori_id',Auth::user()->kategori_id)
            ->get();
        }

        return DataTables::of($petugas)
        ->addColumn('image', function ($petugas){
            return '<img src="'.asset('images/'.$petugas->image).'" alt="">';
        })
        ->addColumn('nama_kategori', function ($admin)
        {
            return $admin->nama_kategori;
        })
        ->addColumn('action', function ($petugas){
            return '<a href="'.url('superadmin/daftar-petugas/'.$petugas->id.'/edit').'" class="btn btn-warning"><i class="fas fa-user-edit text-white"></i></a>'
            .'<button type="button" onclick="hapus('.$petugas->id.')" class="btn btn-danger"><i class="fas fa-trash text-white"></i></button>';
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
        if (Auth::user()->role == "superadmin") {
            $data['title'] = "Create Petugas | SuperAdmin";
        }elseif(Auth::user()->role == "admin"){
            $data['title'] = "Create Petugas | Admin";
        }
        
        $data['layout'] = "form";
        $data['aktif'] = "petugas";
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
            'password' => bcrypt('petugas@123'),
            'role' => 'petugas',
            'kategori_id' => $request->kategori_id,
        ];
        User::create($input);

        if (Auth::user()->role == "superadmin") {
            return redirect('superadmin/daftar-petugas')->with('success', 'Akun Petugas Sukses Di Buat');
        }elseif(Auth::user()->role == "admin"){
            return redirect('admin/daftar-petugas')->with('success', 'Akun Petugas Sukses Di Buat');
        }
        
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
        if (Auth::user()->role == "superadmin") {
            $data['title'] = "Edit Petugas | SuperAdmin";
        }elseif(Auth::user()->role == "admin"){
            $data['title'] = "Edit Petugas | Admin";
        }
        
        $data['layout'] = "form";
        $data['aktif'] = "petugas";
        $data['datapetugas'] = User::find($id);
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
            'password' => bcrypt('petugas@123'),
            'role' => 'petugas',
            'kategori_id' => $request->kategori_id,
        ];
        $gambar = $iduser->image;
        $this->deleteimage($gambar);
        $iduser->update($input);

        if (Auth::user()->role == "superadmin") {
            return redirect('superadmin/daftar-petugas')->with('success', 'Akun Petugas Sukses Di Edit');
        }elseif(Auth::user()->role == "admin"){
            return redirect('admin/daftar-petugas')->with('success', 'Akun Petugas Sukses Di Edit');
        }
        
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
