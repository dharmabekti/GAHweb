<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Kamar;

class KamarController extends Controller
{
    public function index()
    {
    	$kamar = Kamar::orderBy('ID_DETIL_KAMAR')->paginate(10);
    	return view('kamar', compact('kamar'));
    }

    public function pencarian(Request $request)  // Mencari Kamar
    {
      //Search Berdasarkan
      $katakunci = $request->input('katakunci');
      $kamar = Kamar::orderBy('ID_DETIL_KAMAR')->where(function($q) use ($katakunci){
      	  $q->where('ID_KAMAR','LIKE',"%$katakunci%")
      		->orWhere('TEMPAT_TIDUR','LIKE',"%$katakunci%")
      		->orWhere('STAUS_SMOKING','LIKE',"$katakunci%")
      		->orWhere('STATUS_BOOKING','LIKE',"%$katakunci%")
      		->orWhereHas('detilkamar',function($r) use ($katakunci){
      		  	$r->where('detil_kamar.NAMA_KAMAR','LIKE',"%$katakunci%");

      		});
      })->paginate(10);
      $kamar->appends(['katakunci' => $katakunci]);
      return view('kamar', compact('kamar'));
    }
}
