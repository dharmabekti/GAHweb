<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Alert;

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
        	return view('beranda');
        }
    	
    }
}
