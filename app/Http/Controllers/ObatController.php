<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Aktual;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $obat = Obat::join('users', 'users.id', '=', 'obat.user_id')
                ->get(['obat.*', 'users.username']);

            $data = [
                'title' => 'Kelola Obat',
                'obat' => $obat,
            ];
            return view('obat.index', $data);
        } catch (\Throwable $th) {
            return redirect('obat')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $data = [
                'title' => 'Tambah Obat',
            ];
            return view('obat.create', $data);
        } catch (\Throwable $th) {
            return redirect('obat')->with('gagal', 'Halaman Gagal Diakses');
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
            'kd_obat' => 'required|string|min:3|max:3|unique:obat',
            'nama_obat' => 'required|string',
            'jenis_satuan' => 'required|string',

        ], [
            'kd_obat.required' => 'Kode Obat Harus disini !',
            'kd_obat.min' => 'Kode Obat Harus 3 digit huruf ataupun angka',
            'kd_obat.max' => 'Kode Obat Tidak boleh lebih dari 3 digit huruf ataupun angka',
            'kd_obat.unique' => 'Kode Obat Sudah digunakan!, Masukan Kode Obat baru',
            'nama_obat.required' => 'Nama Obat Harus disini !',
            'jenis_satuan.required' => 'Jenis Satuan Harus disini !',
        ]);

        $obat = new Obat();
        $obat->kd_obat = $request->kd_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->jenis_satuan = $request->jenis_satuan;
        $obat->user_id = Auth::user()->id;
        $obat->save();
        return redirect('obat')->with('success', 'Obat berhasil ditambahkan');
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
        try {
            $obat = Obat::findOrFail($id);
            $data = [
                'title' => 'Edit Obat',
                'obat' => $obat,
            ];
            return view('obat.edit', $data);
        } catch (\Throwable $th) {
            return redirect('/obat')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'kd_obat' => 'required|string|min:3|max:3|unique:obat',
            'nama_obat' => 'required|string',
            'jenis_satuan' => 'required|string',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'jenis_satuan' => $request->jenis_satuan,
            'user_id' =>  Auth::user()->id,
        ]);
        return redirect('obat')->with('success', 'Obat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_obat)
    {
        try {
            $obat = Obat::where('kd_obat', $kd_obat);
            $obat->delete();
            $aktual = Aktual::where('kd_obat', $kd_obat);
            $aktual->delete();
            return redirect('obat')->with('success', 'Obat dan Aktual berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect('obat')->with('gagal', 'Obat dan Aktual gagal dihapus');
        }
    }
}
