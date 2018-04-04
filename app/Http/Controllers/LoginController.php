<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      	$user = User::where('username', $request->username)->where('password',$request->password)->first();
      	// $user = DB::table('tbl_user')->where('username', $request->username)->where('password',$request->password)->first();
      	if(!empty($user))
      	{
      		if($user['ID_ROLE'] == 1)
      			return redirect()->route('dashboard');
      		else
      			echo $user['ID_ROLE'];
      	}
      	else
      		echo "Login Gagal";

    }
}
