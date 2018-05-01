<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Alert;
use App\DataDiri;
use App\User;
use App\Reservasi;
use App\DetilReservasi;
define('page', 10);

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


    // DATA RESERVASI
    public function datareservasi()
    {
        $user = DataDiri::where('ID_USER',Session::get('id_user'))->first();
        $reservasi = DetilReservasi::orderBy(\DB::raw('substr(ID_BOOKING, 8)'),'DESC')->where('STATUS_BATAL','TIDAK')
        ->WhereHas('reservasi', function($q) use ($user){
            $q->where('reservasi.ID_DATA_DIRI',$user->ID_DATA_DIRI);
        })->paginate(page);
        return view('customer.datareservasi', compact('reservasi'));
    }

    public function detilreservasi($id)
    {
        $reservasi = DetilReservasi::FindOrFail($id);
        return view('customer.detilreservasi', compact('reservasi'));
    }

    public function batalreservasi($id)
    {
        $reservasi = DetilReservasi::FindOrFail($id);
        if($reservasi->STATUS_BATAL == 'YA'){
            Alert::error('Reservasi Sudah Dibatalkan', 'PERINGATAN')->persistent('Close');
        }
        else{
            $reservasi->STATUS_BATAL = 'YA';
            $reservasi->save();
            Alert::success('Reservasi Dibatalkan', 'SUKSES')->persistent('Close');
        }
        return redirect()->route('customer.datareservasi', compact('reservasi'));
    }

    public function historireservasi()
    {
        $user = DataDiri::where('ID_USER',Session::get('id_user'))->first();
        $reservasi = DetilReservasi::orderBy(\DB::raw('substr(ID_BOOKING, 8)'),'DESC')->where('STATUS_BATAL','YA')
        ->WhereHas('reservasi', function($q) use ($user){
            $q->where('reservasi.ID_DATA_DIRI',$user->ID_DATA_DIRI);
        })->paginate(page);
        return view('customer.historireservasi', compact('reservasi'));
    }
    
}
