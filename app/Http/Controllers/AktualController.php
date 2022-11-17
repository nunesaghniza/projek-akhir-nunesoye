<?php

namespace App\Http\Controllers;

use App\Models\Aktual;
use App\Models\Obat;
use Illuminate\Http\Request;

class AktualController extends Controller
{
    public function index($id)
    {
        $obat = Obat::findOrFail($id);
        $data = [
            'obat' => $obat,
            'aktual' => Aktual::where('kd_obat', $obat->kd_obat),
        ];
        // dd('aktual');
        return view('aktual.index', $data);
    }

    public function create($id)
    {
        $data = ['id' => $id];
        return view('aktual.tambah', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_obat' => 'required|string',
            'bulan' => 'required|string',
            'tahun' => 'required|string',
            'd_aktual' => 'required|numeric',
        ]);

        try {
            $aktual = new Aktual();
            $aktual->kd_obat = $request->kd_obat;
            $aktual->bulan_thn = $request->bulan . ' ' . $request->tahun;
            $aktual->d_aktual = $request->d_aktual;
            $aktual->user_id = 1;
            $aktual->save();
            return redirect('aktual.index');
        } catch (Exception $e) {
            return redirect('aktual.index');
        }
    }
}
