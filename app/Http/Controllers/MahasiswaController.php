<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = user::where('pegawai',0)
            ->orderBy('id','desc')
            ->paginate();
        return view('app.mahasiswa.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('app.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        User::create([
            'username' => $request->nrp,
            'nrp' => $request->nrp,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->nrp),
            'name' => $request->name,
            'bagian_majelis' => $request->bagian_majelis,
            'pegawai' => 0
        ]);


        return redirect()
            ->route("mahasiswa.index")
            ->with('success','Menambahkan data baru berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);

        return view('app.mahasiswa.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function cari(Request $request)
	{ 
        // data mencari berdasarkan $search dan nama form pencarian
        $data = User::when($request->cari,function($search) use ($request){
            $search->where('name','like', "%{$request->cari}%" )
                ->orWhere('nrp','like', "%{$request->cari}%")
                ->orWhere('email','like', "%{$request->cari}%")
                ->orWhere('bagian_majelis','like', "%{$request->cari}%");})
                ->orderBy('id','desc')
                // mengatur batasan data yang tampil data dalam satu halaman
                ->paginate($request->limit ?? 5);
            $data->appends($request->only('cari','limit'));
            // menampilkan data ke view
            return view('app.mahasiswa.index',compact('data'));
    }
            
            

    public function edit($id)
    {
        $data = User::find($id);
        return view('app.mahasiswa.edit',compact('data'));
    }

    /*
    function edit untuk perpindahan halaman.
    function update untuk memanipulasi data
     */
    public function update(Request $request, $id)
    {
        // penggunaan model orm
        $find = user::find($id);
        $user = User::find(Auth::id());
        $user->save();
        // field yang namanya sama harus terisi fieldnya
        $request->validate([
            'nrp' => 'required',
            'no_telp' =>'required',
            'name' => 'required',
            'email'=>'required',
            'bagian_majelis' => 'required',
            ]);
            // memanipulasi data yang mempunyai nama yang  sama pada field
            $find->update([
                'username'=> $request->nrp,
                'nrp' => $request->nrp,
                'no_telp' => $request->no_telp,
                'name' => $request->name,
                'email'=> $request->email,
                'bagian_majelis' => $request->bagian_majelis,
                'pegawai'=> $request->pegawai,
                'password'=> Hash::make($request->new_password)
                ]);
                // pengalihan halam dan pemberitahuan
                return redirect()
                ->route('mahasiswa.index')
                ->with('success','Sukses memperbaharui Data Akun');
            }
                
                
            
            // 'new_password'=> 'required|min:4'
            // User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            // $user->password = bcrypt($request->get('new_password'));
   
            /**
             * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mendelete berdasarkan $id
        user::destroy($id);
        return redirect()
        // menampilkan data dan pemberitahuan
            ->route('mahasiswa.index')
            ->with('success','Sukses menghapus akun');
    }
}
