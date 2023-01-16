<?php

namespace App\Http\Controllers;

use App\Models\Aktual;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AktualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kdObat)
    {
        try {
            $obat = Obat::findOrFail($kdObat);
            $aktual = Aktual::join('users', 'users.id', '=', 'aktual.user_id')
            ->where('aktual.kd_obat', $kdObat)
            ->get(['aktual.*', 'users.username']);

            $data = [
                'title' => 'Data Aktual',
                'obat' => $obat,
                'aktual' => $aktual,
            ];
            // return $data;
            return view('aktual.index', $data);
        } catch (\Throwable $th) {
            return redirect('/obat')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kdObat)
    {
        try {
            $obat = Obat::findOrFail($kdObat);
            $data = [
                'title' => 'Tambah Data Aktual',
                'obat' => $obat,
            ];
            return view('aktual.create', $data);
        } catch (\Throwable $th) {
            // /obat/003/aktual
            return redirect('/obat/' . $kdObat . '/aktual')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bulan' => 'required|string',
            'tahun' => 'required|string',
            'd_aktual' => 'required|numeric',
        ]);

        $aktual = new Aktual();
        $aktual->kd_obat = $request->kd_obat;
        $aktual->bln_thn = $request->bulan . ' ' . $request->tahun;
        $aktual->d_aktual = $request->d_aktual;
        $aktual->user_id = Auth::user()->id;
        $aktual->save();

        return redirect('/obat/' . $request->kd_obat . '/aktual')->with('success', 'Data Aktual berhasil ditambahkan');
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
    public function edit($kdObat, $id)
    {
        try {
            $aktual = Aktual::findOrFail($id);
            $obat = Obat::findOrFail($kdObat);
            $pecah = explode(" ", $aktual['bln_thn']);
            $bulan = $pecah[0];
            $tahun = $pecah[1];

            $data = [
                'title' => 'Edit Aktual',
                'obat' => $obat,
                'aktual' => $aktual,
                'bulan' => $bulan,
                'tahun' => $tahun,
            ];
            return view('aktual.edit', $data);
        } catch (\Throwable $th) {
            return redirect('/obat/' . $kdObat . '/aktual')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd_obat, $id)
    {
            $this->validate($request, [
                'bulan' => 'required|string',
                'tahun' => 'required|string',
                'd_aktual' => 'required|numeric',
            ]);

            $aktual = Aktual::findOrFail($id);

            $aktual->update([
                'bln_thn' => $request->bulan . ' ' . $request->tahun,
                'd_aktual' => $request->d_aktual,
                'user_id'=> Auth::user()->id,
            ]);

            return redirect('/obat/' . $request->kd_obat . '/aktual')->with('success', 'Data Aktual berhasil diupdate');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_obat, $id)
    {
        try {
            Aktual::destroy($id);
            return redirect('/obat/' . $kd_obat . '/aktual')->with('success', 'Data Aktual berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect('/obat/' . $kd_obat . '/aktual')->with('gagal', 'Data Aktual gagal dihapus');
        }
    }
}
