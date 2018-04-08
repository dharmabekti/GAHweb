<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Alert;
use App\User;
use DB;


class LoginController extends Controller
{
    public function home()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

      	$user = User::where('username', $username)->where('password',$password)->first();
      	if(!empty($user))
      	{
          Session::put('username',$username);
          Session::put('password',$password);
          Session::put('login',TRUE);
      		if($user['ID_ROLE'] == 1)
          {
            Alert::success('Selamat Datang, '. $username, 'LOGIN SUKSES')->persistent('Close');
      			return redirect()->route('dashboard');
          }
      		else
      			echo $user['ID_ROLE'];
      	}
      	else
        {
      		Alert::error('Login Gagal' , 'WARNING')->persistent('Close');
          return redirect()->route('login.home');
        }

    }

    public function logout()
    {
        Session::flush();
        Alert::success('Anda Telah Logout' , 'SUKSES')->persistent('Close');
        return redirect()->route('login.home');
    }
}
