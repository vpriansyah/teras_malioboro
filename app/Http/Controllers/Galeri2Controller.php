<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Galeri2Controller extends Controller
{
    public function index()
    {
        $data_pkl = Galeri::filter(request(['search', 'kat_dagangan', 'lokasi_teras', 'lokasi_gedung', 'lokasi_lantai']))->paginate(12);
        $kat_brg = DB::table('kat_dagangan')->get();
        $lokasi_teras = DB::table('lokasi_teras')->get();

        // dd($data_pkl);
        // return view('publik.galeri2', compact('kat_brg','lokasi_teras','data_pkl','lokasi_kios','lokasi_lantai','lokasi_gedung'));

        return view('publik.galeri2', [
            'data_pkl' => $data_pkl,
            'kat_brg' => $kat_brg,
            'lokasi_teras' => $lokasi_teras
        ]);
    }

    public function getgedung(Request $request)
    {
        $id_teras = $request->id_teras;
        $lokasi_gedung = DB::table('lokasi_gedung')->where('lokasi_teras_id', $id_teras)->get();

        if ($id_teras == 'TRUE') {
            echo "<select class='form-select' name='gedung' id='lokasi_gedung' disabled>";
            echo "<option value='TRUE'>Semua</option>";
            foreach ($lokasi_gedung as $gedung) {
                echo "<option value='$gedung->id'>$gedung->nama</option>";
            }
            echo "</select>";
        } else {
            echo "<select class='form-select' name='gedung' id='lokasi_gedung'>";
            echo "<option value='TRUE'>Semua</option>";
            foreach ($lokasi_gedung as $gedung) {
                echo "<option value='$gedung->id'>$gedung->nama</option>";
            }
            echo "</select>";
        }
    }

    public function getlantai(Request $request)
    {
        $id_gedung = $request->id_gedung;
        $lokasi_lantai = DB::table('lokasi_lantai')->where('lokasi_gedung_id', $id_gedung)->get();

        if ($id_gedung == 'TRUE') {
            echo "<select class='form-select' name='lantai' id='lokasi_lantai' disabled>";
            echo "<option value='TRUE'>Semua</option>";
            foreach ($lokasi_lantai as $lantai) {
                echo "<option value='$lantai->id'>$lantai->nama</option>";
            }
            echo "</select>";
        } else {
            echo "<select class='form-select' name='lantai' id='lokasi_lantai'>";
            echo "<option value='TRUE'>Semua</option>";
            foreach ($lokasi_lantai as $lantai) {
                echo "<option value='$lantai->id'>$lantai->nama</option>";
            }
            echo "</select>";
        }
    }

    public function data($id)
    {
        $data_pkl = DB::table('data_pkl')->where("id", $id)->get();
        //        dd($data_pkl);
        $lokasi_no_kios = DB::table('data_pkl')
            ->join('lokasi_no_kios', 'lokasi_no_kios.id', '=', 'data_pkl.lokasi_no_kios_id')
            ->select('lokasi_no_kios.*')
            ->get();
        return view('publik.galeri-data', ['data_pkl' => $data_pkl], ['lokasi_no_kios' => $lokasi_no_kios]);
    }

    public function group($id)
    {
        $data_pkl = DB::table('data_pkl')->where('kat_dagangan_id', $id)->paginate(12);
        $kat_brg = DB::table('kat_dagangan')->get();
        $lokasi_teras = DB::table('lokasi_teras')->get();
        $lokasi_kios = DB::table('lokasi_no_kios')->get();
        $lokasi_lantai = DB::table('lokasi_lantai')->get();
        $lokasi_gedung = DB::table('lokasi_gedung')->get();
        return view('publik.galeri2', compact('kat_brg', 'lokasi_teras', 'data_pkl', 'lokasi_kios', 'lokasi_lantai', 'lokasi_gedung'));
    }

    public function cari(Request $request)
    {
        $data['q'] = $request->query('search');
        $dagangan = DB::table('data_pkl')->where('dagangan', 'like', '%' . $data["q"] . '%');
        $data_pkl = DB::table('data_pkl')->where('nama_lengkap', 'like', '%' . $data["q"] . '%')->union($dagangan)->paginate(12);
        $kat_brg = DB::table('kat_dagangan')->get();
        $lokasi_teras = DB::table('lokasi_teras')->get();
        $lokasi_kios = DB::table('lokasi_no_kios')->get();
        $lokasi_lantai = DB::table('lokasi_lantai')->get();
        $lokasi_gedung = DB::table('lokasi_gedung')->get();
        // return view('publik.galeri2', compact('kat_brg','lokasi_teras','data_pkl','lokasi_kios','lokasi_lantai','lokasi_gedung'));
        return view('publik.galeri2', [
            'data_pkl' => $data_pkl,
            'kat_brg' => $kat_brg,
            'lokasi_teras' => $lokasi_teras,
            'lokasi_gedung' => $lokasi_gedung,
            'lokasi_lantai' => $lokasi_lantai,
            'lokasi_kios' => $lokasi_kios
        ]);
    }
}