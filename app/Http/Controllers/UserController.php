<?php

namespace App\Http\Controllers;

use App\HakAkses;
use App\Roles;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = user::where('pegawai',1)
            ->orderBy('id','desc')
            ->paginate();
        return view('app.users.users',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('app.users.users_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //CREATE untuk mengarahkan ke view, store untuk memanipulasi data
    public function store(Request $request)
    {

        User::create([
            'username' => $request->username,
            'nrp' => $request->username,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->username),
            'name' => $request->name,
            'pegawai' => 1
        ]);


        return redirect()
            ->route("user.index")
            ->with('success','Menambahkan data pengguna baru berhasil');
    }

    // 
    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);

        return view('app.users.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = user::find($id);
        return view('app.users.user_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    // edit sebagai routenya, update untuk memanipulasi data
    public function update(Request $request, $id)
    {
        $find = user::find($id);
       

        $request->validate([
            'nrp' => 'required',
            'no_telp' =>'required',
            'name' => 'required',
            'email'=>'required',
            'bagian_majelis' => 'required',
            // 'new_password'=> 'required|min:4'
        ]);
            
        $user = User::find(Auth::id());
        $user->save();

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
        
        return redirect()
            ->route('user.index')
            ->with('success','Sukses memperbaharui Data Akun');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       user::destroy($id);
        return redirect()
            ->route('user.index')
            ->with('success','Sukses menghapus akun');
    }

    /**
     * Change password method
     */

    public function change_password(Request $request)
    {
        // jika ada nama yang sama dalam field maka harus di isi field tersebut
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:4'
        ]);

        // penggunaan auth dan model orm
        $user = User::find(Auth::id());
        // encryption password
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        // pencocokan kata sandi 
        if(Hash::check($request->old_password,$user->password)){
            $user->update([
                // enskripsi password
                'password' => Hash::make($request->old_password)
            ]);
            $response = ['success','Sukses mengganti password, password berhasil dirubah'];
        }else{
            $response = ['error','Gagal mengganti password, password lama salah.'];
        }
        
        return redirect('change-password')
        ->with($response[0],$response[1]);
    }


        
    // $user = User::find(Auth::id());
    // $user->password = bcrypt($request->get('new_password'));
    // $user->save();
    
    // if (!(hash::check($request->get('old_password'), 
    // Auth::user()->password)))
    // {
    //     return redirect('change-password')
    //     ->with("eror","password lamna tidak cocok");
    // }
    // if (strcmp($request->get('old_password'), 
    // $request->get('new_password'))==0)
    // {
    //     return redirect('change-password')
    //     ->with("eror","password yang baru tidak cocok");
    // }
    // $user = User::find(Auth::id());
    // $user->password = bcrypt($request->get('new_password'));
    // $user->save();
    // return redirect('change-password')
    //     ->with("succes","password telah diubah");
}
