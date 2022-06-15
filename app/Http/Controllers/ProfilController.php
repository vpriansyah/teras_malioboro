<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profil;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function index()
    {
        $data_pkl = DB::table('data_pkl')
            ->where('nik',  '=', Auth::user()->name)
            ->get();
        $barang = DB::table('barang')
            ->get();
        return view('pedagang.profil', ['data_pkl' => $data_pkl, 'barang' => $barang] );

    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pkl = Profil::find($id);
        return view('pedagang.edit', compact(
            'data_pkl'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [

            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat_ktp' => 'required',
            'paguyuban_id' => 'required',
            'nik' => 'required',
            'no_kk' => 'required',

        ]);

        $profil = Profil::where('id', $request->id);
        $profil->update([

            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'alamat_ktp' => $request->alamat_ktp,
            'paguyuban_id' => $request->paguyuban_id,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'nomor_nib' => $request->nomor_nib

        ]);

        if ($profil) {
            return redirect()
                ->route('pedagang.profil')
                ->with([
                    Alert::success('Berhasil', 'Artikel Berhasil Diubah')
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    Alert::error('Gagal', 'Artikel Gagal Diubah')
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}