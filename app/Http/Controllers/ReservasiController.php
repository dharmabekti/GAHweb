<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\DetilReservasi;
use Alert;

class ReservasiController extends Controller
{
    public function index()
    {
    	$reservasi = DetilReservasi::orderBy('ID_DETIL_RESERVASI', 'DESC')->paginate(10);
    	return view('reservasi.index', compact('reservasi'));
    }

    public function pencarian(Request $request)
    {
      	$katakunci = $request->input('katakunci');
      	$reservasi = DetilReservasi::orderBy('ID_DETIL_RESERVASI', 'DESC')->where(function($q) use ($katakunci){
      	  $q->where('STATUS_BATAL','LIKE',"%$katakunci%")
      	  	->orWhereHas('reservasi', function($r) use ($katakunci){
      		  	$r->where('reservasi.ID_BOOKING','LIKE',"%$katakunci%")
      		  	  ->orWhereHas('kamar',function($s) use ($katakunci){
	      		  	$s->where('kamar.ID_KAMAR','LIKE',"%$katakunci%")
		      		  ->orWhereHas('detilkamar',function($s1) use ($katakunci){
		      		  	$s1->where('detil_kamar.NAMA_KAMAR','LIKE',"%$katakunci%");
		      			});
	      			})
      		  	  ->orWhereHas('datadiri',function($t) use ($katakunci){
	      		  	$t->where('data_diri.NAMA','LIKE',"%$katakunci%")
	      		  	  ->orWhere('data_diri.NO_IDENTITAS','LIKE',"%$katakunci%");
	      			})
      			  ->orWhereHas('kota',function($u) use ($katakunci){
	      		  	$u->where('kota.NAMA_KOTA','LIKE',"%$katakunci%");
	      			});
	      		});
      	})->paginate(10);
      	$reservasi->appends(['katakunci' => $katakunci]);
      	return view('reservasi.index', compact('reservasi'));
    }

    public function detilreservasi($id)
    {
    	$reservasi = DetilReservasi::FindOrFail($id);
    	return view('reservasi.detil', compact('reservasi'));
    }

    public function batalreservasi($id)
    {
    	$reservasi = DetilReservasi::FindOrFail($id);
    	$reservasi->STATUS_BATAL = 'YA';
    	$reservasi->save();
    	Alert::success('Reservasi Dibatalkan', 'SUKSES')->persistent('Close');
      return redirect()->route('reservasi.tampil', compact('reservasi'));
    }
}
