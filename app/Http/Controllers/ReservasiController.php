<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Alert;
use DB;
use Carbon\Carbon;
use App\Reservasi;
use App\DetilReservasi;
use App\DataDiri;
use App\Kamar;
use App\Kota;
use App\Tarif;
define('page', 10);

class ReservasiController extends Controller
{
    public function index()
    {
    	$reservasi = DetilReservasi::orderBy(\DB::raw('substr(ID_BOOKING, 8)'),'DESC')->where('STATUS_BATAL','TIDAK')->paginate(page);
      $customer = null;
    	return view('reservasi.index', compact('reservasi','customer'));
    }

    public function pencarian(Request $request)
    {
      	$katakunci = $request->input('katakunci');
      	$reservasi = DetilReservasi::orderBy(\DB::raw('substr(ID_BOOKING, 8)'),'DESC')->where('STATUS_BATAL','TIDAK')
        ->where(function($q) use ($katakunci){
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
      	})->paginate(page);
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
      if($reservasi->STATUS_BATAL == 'YA')
      {
        Alert::error('Reservasi Sudah Dibatalkan', 'PERINGATAN')->persistent('Close');
      }
      else
      {
        $reservasi->STATUS_BATAL = 'YA';
        $reservasi->save();
        Alert::success('Reservasi Dibatalkan', 'SUKSES')->persistent('Close');
      }
      return redirect()->route('reservasi.tampil', compact('reservasi'));
    }



    // HISTORY RESERVASI
    public function history()
    {
      $reservasi = DetilReservasi::orderBy(\DB::raw('substr(ID_BOOKING, 8)'),'DESC')->where('STATUS_BATAL','YA')->paginate(page);
      return view('reservasi.history', compact('reservasi'));
    }

    public function pencarian_history(Request $request)
    {
        $katakunci = $request->input('katakunci');
        $reservasi = DetilReservasi::orderBy('ID_DETIL_RESERVASI', 'DESC')->where('STATUS_BATAL','YA')->where(function($q) use ($katakunci){
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
        })->paginate(page);
        $reservasi->appends(['katakunci' => $katakunci]);
        return view('reservasi.history', compact('reservasi'));
    }


    // TAMBAH RESERVASI
    public function caricustomer(Request $request)
    {
      $caricustomer = $request->input('caricustomer');
      $reservasi = DetilReservasi::orderBy('ID_DETIL_RESERVASI', 'DESC')->where('STATUS_BATAL','TIDAK')->paginate(page);
      
      if($caricustomer != '')
      {
        $customer = DataDiri::orderBy('ID_DATA_DIRI')->where(function($q) use ($caricustomer){
          $q->where('NAMA','LIKE',"%$caricustomer%")
            ->orWhere('NO_IDENTITAS','LIKE',"%$caricustomer%")
            ->orWhereHas('user',function($r) use ($caricustomer){
              $r->where('tbl_user.USERNAME','LIKE',"%$caricustomer%");
          });
        })->get();
      }else{
        $customer = null;
      }
      
      return view('reservasi.index', compact('reservasi','customer'));
    }

    public function tambah_reservasi($id)
    {
      $customer = DataDiri::FindOrFail($id);
      $kamar = Kamar::orderBy('ID_KAMAR')->where('STATUS_BOOKING', 'TERSEDIA')->get();
      $kota = Kota::orderBy('NAMA_KOTA')->get();
      $tarif = Tarif::orderBy('HARGA_TARIF', 'DESC')->get();

      $list = ['customer', 'kamar', 'kota', 'tarif'];
      return view('reservasi.tambah', compact($list));
    }

    public function simpan_reservasi(Request $request)
    {
      $getID = Reservasi::orderBy(\DB::raw('substr(ID_BOOKING, 8)'),'DESC')->first();
      $ID = explode("-", $getID->ID_BOOKING);

      if($request->kategori == 'Personal') {
        // $timestamp = str_replace(['-', ':'], '', Carbon::now()->toDateString());
        $kode = 'P' . Carbon::now()->format('dmy') . '-';
      }
      else{
        $kode = 'G' . Carbon::now()->format('dmy') . '-';
      }

      $no = (int)$ID[1] + 1;
      if(strlen($no) == '1'){
        $id_booking = $kode . '00' . $no;
      }
      else if(strlen($no) == '2'){
        $id_booking = $kode . '0' . $no;
      }
      else{
        $id_booking = $kode . $no;
      }

      $reservasi = new Reservasi();
      $reservasi->ID_BOOKING = $id_booking;
      $reservasi->TGL_RESERVASI = Carbon::now();
      $reservasi->ID_KAMAR = $request->kamar;
      $reservasi->ID_DATA_DIRI = $request->id_data_diri;
      $reservasi->ID_KOTA = $request->kota;
      $reservasi->ID_TARIF = $request->tarif;
      $reservasi->TGL_MENGINAP = $request->tgl_pemesanan;
      
      if($reservasi->save()){
        $detilreservasi = new DetilReservasi();
        $detilreservasi->JENIS_TAMU = $request->kategori;
        $detilreservasi->JUMLAH_TAMU = $request->tamu_dewasa + $request->tamu_anak;
        $detilreservasi->STATUS_BATAL = 'TIDAK';
        $detilreservasi->JUMLAH_KAMAR = $request->jumlah_kamar;
        $detilreservasi->JUMLAH_ANAK = $request->tamu_anak;
        $detilreservasi->JUMLAH_DEWASA = $request->tamu_dewasa;
        $detilreservasi->ID_BOOKING = $reservasi->ID_BOOKING;
        $detilreservasi->save();
      }

      Alert::success('Reservasi Ditambahkan', 'SUKSES')->persistent('Close');
      return redirect()->route('reservasi.tampil', compact('reservasi'));
    }


    public function ubah_reservasi($id)
    {
      $detilreservasi = DetilReservasi::FindOrFail($id);
      $kamar = Kamar::orderBy('ID_KAMAR')->where('STATUS_BOOKING', 'TERSEDIA')->get();
      $kota = Kota::orderBy('NAMA_KOTA')->get();
      $tarif = Tarif::orderBy('HARGA_TARIF', 'DESC')->get();

      $list = ['detilreservasi','kamar', 'kota', 'tarif'];
      return view('reservasi.ubah', compact($list));
    }

    public function simpan_perubahan_reservasi(Request $request, $id)
    {
      $detilreservasi = DetilReservasi::FindOrFail($id);
      $detilreservasi->JENIS_TAMU = $request->kategori;
      $detilreservasi->JUMLAH_TAMU = $request->tamu_dewasa + $request->tamu_anak;
      $detilreservasi->JUMLAH_KAMAR = $request->jumlah_kamar;
      $detilreservasi->JUMLAH_ANAK = $request->tamu_anak;
      $detilreservasi->JUMLAH_DEWASA = $request->tamu_dewasa;
      $detilreservasi->save();

      $reservasi = Reservasi::FindOrFail($detilreservasi->ID_BOOKING);
      $reservasi->ID_KAMAR = $request->kamar;
      $reservasi->ID_KOTA = $request->kota;
      $reservasi->ID_TARIF = $request->tarif;
      $reservasi->TGL_MENGINAP = $request->tgl_pemesanan;
      $reservasi->save();

      Alert::success('Reservasi Diperbarui', 'SUKSES')->persistent('Close');
      return redirect()->route('reservasi.tampil', compact('reservasi'));
    }

}
