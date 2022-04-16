<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;
Use Alert;

class ProfilesController extends Controller
{
    public function profil()
    {
        return view ('pages.profile', array('user'=> Auth::user()));
    }

    public function edit()
    {
        return view ('pages.editprofile', array('user'=> Auth::user()));
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);
        
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = $avatar->getClientOriginalName();
            Image::make($avatar)->fit(300,300)->save( public_path('/images/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        toast('Profil Berhasil Diubah','success');
            return redirect('/profil');
    }

    public function ubahkatasandi()
    {
        return view ('pages.resetpassword');
    }

    public function update_password(Request $request)
    {
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))){
            toast('Kata Sandi Tidak Cocok','error');
            return back();
        }
        if (strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
            toast('Kata Sandi Tidak Boleh Sama','error');
            return back();
        }
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required'
        ]);
        $user=Auth::user();
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        Alert::success('Sukses','Password Berhasil di Ubah');
        return redirect('/profil');
    }
}
