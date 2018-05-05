<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Alert;
use App\DataDiri;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
    	if(!Session::get('login')==TRUE)
    	{
            Alert::error('Silahkan Login Terlebih Dahulu', 'WARNING')->persistent('Close');
      		return redirect()->route('login.home');
        }
        else
        {
            if(Session::get('role') == 6)
            {
                $profil = DataDiri::where('ID_USER',Session::get('id_user'))->first();
                if(empty($profil))
                    return view('customer.create');
                else
                    return view('customer.profil', compact('profil'));
            }
            else{
                $user = User::where('ID_USER',Session::get('id_user'))->first();
                return view('beranda', compact('user'));
            }
        }
    	
    }

    public function home(){
        return view('welcome');
    }
}
