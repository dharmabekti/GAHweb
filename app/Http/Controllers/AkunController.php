<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Role;
use App\Kota;
use Alert;

class AkunController extends Controller
{
    public function index()
    {
    	$user = User::orderBy('ID_USER')->whereNotIn('ID_ROLE',[6])->paginate(10);
    	$role = Role::orderBy('ID_ROLE')->whereNotIn('ID_ROLE',[6])->get();
    	$kota = Kota::all();
    	$dataUser = null;

    	$list = ['user', 'role', 'kota', 'dataUser'];
    	return view('akunpengguna.index', compact($list));
    }

    public function simpan(Request $request)
    {
    	if($request->idUser == "")
    	{
	    	$user = new User();
	    	$user->USERNAME = $request->username;
	    	$user->PASSWORD = $request->username;
	    	$user->ID_ROLE = $request->role;
	    	$user->ID_KOTA = $request->kota;
	    	$user->save();
	    	Alert::success('Pegawai Baru Berhasil Disimpan' , 'SUKSES')->persistent('Close');
	    }
	    else
	    {
	    	$user = User::FindOrFail($request->idUser);
	    	$user->USERNAME = $request->username;
	    	// $user->PASSWORD = $request->username;
	    	$user->ID_ROLE = $request->role;
	    	$user->ID_KOTA = $request->kota;
	    	$user->save();
	    	Alert::success('Pegawai Berhasil Diperbarui' , 'SUKSES')->persistent('Close');
	    }
	    // dd($user);

    	// return $this->index();
    	return redirect()->route('pegawai.tampil');
    }

    public function pencarian(Request $request)
    {
    	$katakunci = $request->input('katakunci');
      	$user = User::orderBy('ID_USER')->where(function($q) use ($katakunci){
      	  $q->where('USERNAME','LIKE',"%$katakunci%")
      		->orWhereHas('role',function($r) use ($katakunci){
      		  	$r->where('role.NAMA_ROLE','LIKE',"%$katakunci%");
      		})
      		->orWhereHas('kota',function($r) use ($katakunci){
      		  	$r->where('kota.NAMA_KOTA','LIKE',"%$katakunci%");
      		});
      	})->paginate(10);
      	$user->appends(['katakunci' => $katakunci]);

      	$role = Role::orderBy('ID_ROLE')->whereNotIn('ID_ROLE',[6])->get();
    	$kota = Kota::all();
    	$dataUser = null;

    	$list = ['user', 'role', 'kota', 'dataUser'];
    	return view('akunpengguna.index', compact($list));
    }

    public function ubah($id)
    {
    	$user = User::orderBy('ID_USER')->whereNotIn('ID_ROLE',[6])->paginate(10);
    	$role = Role::orderBy('ID_ROLE')->whereNotIn('ID_ROLE',[6])->get();
    	$kota = Kota::all();
    	$dataUser = User::FindOrFail($id);

    	$list = ['user', 'role', 'kota', 'dataUser'];
    	return view('akunpengguna.index', compact($list));
    }

    public function hapus($id)
    {
    	$user = User::FindOrFail($id);
    	$user->delete();
    	Alert::success('Pegawai Berhasil Dihapus' , 'SUKSES')->persistent('Close');
    	return redirect()->route('pegawai.tampil');
    }

    public function resetpassword($id)
    {
    	$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$string = '';
		$max = strlen($characters) - 1;
		for ($i = 0; $i < 6; $i++) {
			$string .= $characters[mt_rand(0, $max)];
		}
		$user = User::FindOrFail($id);
		$user->PASSWORD = $string;
		$user->save();
		Alert::success('Password Baru Pegawai : ' . $string, 'SUKSES')->persistent('Close');

    	return redirect()->route('pegawai.tampil');
    }



    public function indexCustomer()
    {
        $user = User::orderBy('ID_USER')->where('ID_ROLE',6)->paginate(10);
        return view('customer.index', compact('user'));
    }
}
