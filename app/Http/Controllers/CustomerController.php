<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\DataDiri;
use App\User;
use Alert;

class CustomerController extends Controller
{
    public function ubah($id)
    {
        $profil = DataDiri::FindOrFail($id);
    	return view('customer.edit', compact('profil'));
    }

    public function simpanPerubahan(Request $request, $id)
    {
        $profil = DataDiri::FindOrFail($id);
        $profil->NAMA = $request->nama;
        $profil->NO_IDENTITAS = $request->no_identitas;
        $profil->JENIS_KELAMIN = $request->kelamin;
        $profil->NAMA_INSTITUSI = $request->institusi;
        $profil->NO_TELEPON = $request->telp;
        $profil->EMAIL = $request->email;
        $profil->ALAMAT = $request->alamat;
        $profil->save();

        $user = User::FindOrFail($profil->ID_USER);
        $user->USERNAME = $request->username;
        $user->save();
        Session::put('username',$request->username);

        Alert::success('Perubahan Disimpan', 'SUKSES')->persistent('Close');
        return redirect()->route('dashboard');
    }

    public function gantipassword(Request $request, $id)
    {
        $profil = DataDiri::FindOrFail($id);
        $user = User::FindOrFail($profil->ID_USER);

        if($request->passwordlama == $user->PASSWORD)
        {
            if($request->passwordbaru == $request->konfirmasi)
            {
                $user->PASSWORD = $request->passwordbaru;
                $user->save();
                Alert::success('Password Berhasil Diganti', 'SUKSES')->persistent('Close');
                return redirect()->route('dashboard', compact('reservasi'));
            }
            else
                Alert::error('Konfirmasi Password Tidak Sesuai', 'PERINGATAN')->persistent('Close');
        }
        else
            Alert::error('Password Lama Tidak Sesuai', 'WARNING')->persistent('Close');

        return redirect()->route('customer.ubah', ['id' => $profil->ID_DATA_DIRI]);

    }

    public function simpan(Request $request)
    {
        $profil = new DataDiri();
        $profil->NAMA = $request->nama;
        $profil->NO_IDENTITAS = $request->no_identitas;
        $profil->JENIS_KELAMIN = $request->kelamin;
        $profil->NAMA_INSTITUSI = $request->institusi;
        $profil->NO_TELEPON = $request->telp;
        $profil->EMAIL = $request->email;
        $profil->ALAMAT = $request->alamat;
        $profil->ID_USER = Session::get('id_user');
        $profil->save();

        Alert::success('Data Diri Berhasil Disimpan', 'SUKSES')->persistent('Close');
        return redirect()->route('dashboard');
    }
}
