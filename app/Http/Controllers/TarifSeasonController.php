<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Alert;
use App\Tarif;
use App\Season;

class TarifSeasonController extends Controller
{
    public function index()
    {
    	$tarif = Tarif::orderBy('ID_TARIF')->paginate(5);
    	$season = Season::orderBy('ID_SEASON')->paginate(5);

    	$dataTarif = null;
    	$list = ['tarif', 'season', 'dataTarif'];
    	return view('tarif_season', compact($list));
    }

    public function simpanTarif(Request $request)
    {
        $tarif = new Tarif();
        $tarif->HARGA_TARIF = $request->tarifbaru;
        $tarif->save();

        Alert::success('Tarif Baru Berhasil Disimpan' , 'SUKSES')->persistent('Close');
        return redirect()->route('tarifseason.tampil');
    }

    public function editTarif($id)
    {
    	$tarif = Tarif::orderBy('ID_TARIF')->paginate(5);
    	$season = Season::orderBy('ID_SEASON')->paginate(5);

        $dataTarif = Tarif::FindOrFail($id);
        $list = ['tarif', 'season','dataTarif'];
        return view('tarif_season', compact($list));
    }

    public function updateTarif(Request $request, $id)
    {
        // $proposal = Pkm::FindOrFail($id);
        // $proposal->bidang_pkm = $request->bidang_pkm;
        // $proposal->judul_pkm = $request->judul_pkm;
        // $proposal->save();

        // Alert::success('Bidang PKM Telah Diperbarui', 'SUKSES')->persistent('Close');
        // return redirect()->route('pengusul.index');
    }

    public function hapusTarif($id)
    {
        $tarif = Tarif::FindOrFail($id);
        $tarif->delete();

        Alert::error('Tarif Berhasil Dihapus' , 'SUKSES')->persistent('Close');
        return redirect()->route('tarifseason.tampil');
    }

    public function simpanSeason(Request $request)
    {
        $season = new Season();
        $season->NAMA_SEASON = $request->seasonbaru;
        $season->save();

        Alert::success('Season Baru Berhasil Disimpan' , 'SUKSES')->persistent('Close');
        return redirect()->route('tarifseason.tampil');
    }

    public function hapusSeason($id)
    {
        $season = Season::FindOrFail($id);
        $season->delete();

        Alert::error('Season Berhasil Dihapus' , 'SUKSES')->persistent('Close');
        return redirect()->route('tarifseason.tampil');
    }
}
