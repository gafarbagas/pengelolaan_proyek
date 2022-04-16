<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;
use Image;
use Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view ('pages.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view ('pages.user.create', ['role_name' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'role_id' => 'required|',
            'username' => 'required|max:255|unique:users,username',
            'password' => 'required|max:255',
        ];

        $customMessage = [
            'required' => 'Silahkan Masukan :attribute',
            'unique' => ':attribute Telah Digunakan'
        ];
        
        $this->validate($request, $rules, $customMessage);
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'role_id' => 'required|',
        //     'username' => 'required|max:255',
        //     'password' => 'required|max:255',
        // ]);

        User::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        Alert::success('Sukses','Data Berhasil Ditambah');
        return redirect('/pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.user.detail',['user' => $user]);
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('pages.user.detail',['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view ('pages.user.edit', ['user' => $user]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            'name' => 'required|max:255',
            'role_id' => 'required|',
            'username' => "required|max:255|unique:users,username,$id",
        ];

        $customMessage = [
            'required' => 'Silahkan Masukan :attribute',
            'unique' => ':attribute Telah Digunakan'
        ];
        
        $this->validate($request, $rules, $customMessage);
        $user->update([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'username' => $request->username,
        ]);
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = $avatar->getClientOriginalName();
            $user->avatar = $request->file('avatar')->getClientOriginalName();
            Image::make($avatar)->fit(300,300)->save( public_path('/images/' . $filename));

            $user->avatar = $filename;
            $user->save();
        }
        
        toast('Data Berhasil Diubah','success');
        return redirect('/pengguna');
    }

    public function editpasswordform(User $user){
        return view('pages.user.resetpassword', ['user' => $user]);
    }

    public function editpassword(Request $request, $id){
        $user = User::find($id);
        // if (!(Hash::check($request->get('currentpassword'), $user->password))){
        //     toast('Kata Sandi Tidak Cocok','error');
        //     return back();
        // }
        // if (strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
        //     toast('Kata Sandi Tidak Boleh Sama','error');
        //     return back();
        // }
        $request->validate([
            // 'currentpassword' => 'required|max:255',
            'newpassword' => 'required|max:255'
        ]);
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        Alert::success('Sukses','Password Berhasil di Ubah');
        return redirect('/pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        toast('Data Telah Dihapus','success');
        return redirect('/pengguna');
    }

    public function laporan() 
    {
        $users = User::all();
        $pdf = PDF::loadView('pages.user.userpdf', ['users' => $users]);
        $pdf->setPaper('A4');
        return $pdf->stream('datapengguna.pdf');
    }
}
