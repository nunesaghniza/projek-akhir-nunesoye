<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $data['obat'] = Obat::all();
        return view('obat.index', $data);
    }

    public function create()
    {
        return view('obat.tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_obat' => 'required|string',
            'nama_obat' => 'required|string',
            'jenis_satuan' => 'required|string',
        ]);

        try {
            $obat = new Obat();
            $obat->kd_obat = $request->kd_obat;
            $obat->nama_obat = $request->nama_obat;
            $obat->jenis_satuan = $request->jenis_satuan;
            $obat->user_id = 1;
            $obat->save();
            return redirect('obat');
        } catch (Exception $e) {
            return redirect('obat');
        }
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        $data = [
            'obat' => $obat,
        ];
        return view('obat.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kd_obat' => 'required|string',
            'nama_obat' => 'required|string',
            'jenis_satuan' => 'required|string',
        ]);

        try {
            $obat = Obat::findOrFail($id);
            $obat->update([
                'nama_obat' => $request->nama_obat,
                'jenis_satuan' => $request->jenis_satuan,
            ]);
            return redirect('obat');
        } catch (Exception $e) {
            die("Gagal");
        }
    }
    public function destroy($id)
    {
        try {
            $obat = Obat::findOrFail($id);
            $obat->delete();
            return redirect('obat');
        } catch (Exception $e) {
            return redirect('obat');
        }
    }
}
