<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $data['penjualan'] = Penjualan::all();
        return view('penjualan.index', $data);
    }

    public function show()
    {
        return view('penjualan.tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bulan' => 'required|string',
            'tahun' => 'required|string',
            'd_aktual'         => 'required|numeric',
        ]);

        try {
            $penjualan = new Penjualan();
            $penjualan->bulan_thn = $request->bulan . ' ' . $request->tahun;
            $penjualan->d_aktual = $request->d_aktual;
            $penjualan->save();
            return redirect('penjualan');
        } catch (Exception $e) {
            return redirect('penjualan');
        }
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $pecah = explode(" ", $penjualan['bulan_thn']);
        $bulan = $pecah[0];
        $tahun = $pecah[1];

        $data = [
            'penjualan' => [
                'data' => $penjualan,
                'bulan' => $bulan,
                'tahun' => $tahun,
            ],
        ];

        return view('penjualan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bulan_thn' => 'required|string',
            'd_aktual'         => 'required|numeric',
        ]);
        try {
            $penjualan = Penjualan::findOrFail($id);
            $penjualan->update([
                'bulan_thn' => $request->bulan_thn,
                'd_aktual' => $request->d_aktual,
            ]);
            return back()->with('msg', 'Berhasil Merubah Data');
        } catch (Exception $e) {
            die("Gagal");
        }
    }

    public function destroy($id)
    {
        try {
            $penjualan = Penjualan::findOrFail($id);
            $penjualan->delete();
            return redirect('penjualan');
        } catch (Exception $e) {
            return redirect('penjualan');
        }
    }
}
