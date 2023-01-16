<?php

namespace App\Http\Controllers;

use App\Models\Aktual;
use App\Models\Obat;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ForecastingController extends Controller
{

    public function index()
    {
        try {
            // menapilkan data dari 2 table seperti query tampil
            $obat = DB::select(DB::raw('SELECT * FROM aktual RIGHT JOIN obat ON obat.kd_obat = aktual.kd_obat'));
            $d_perkiraan = 0;
            $n_alpa = 0.1;
            $array_perkiraan = [];
            $obatbaru = [];

            // return $obat;

            // group obat by kd_obat from aktual and obat
            foreach ($obat as $key => $item) {

                if (empty($obatbaru[$item->kd_obat])) {
                    $obatbaru[$item->kd_obat] = [];
                }
                $obatbaru[$item->kd_obat][] = $item;
            }

            // ! group obat / obat_baru -> generate perkiraan berikutnya berdasarkan kd_obat 
            // item_obat = menampilkan data aktual berdasarkan kd_Obat. misal paracetamol doank. tidak ada obat yg lain.

            foreach ($obatbaru as $key_obat => $item_obat) {

                // ! proses looping menentukan forecasting -> menghitung semua aktual data, untuk mendapatkan perkiraan berikutnya
                foreach ($item_obat as $key => $item) {
                    // menghitung semua forecasting dari aktual sebelumnya 
                // $item yaitu data aktual pertama dari paracetamol

                    if ($key < 2) {
                        $d_perkiraan = $item_obat[0]->d_aktual;
                    } else {
                        $d_perkiraan = ($n_alpa * $item_obat[$key - 1]->d_aktual) + (1 - $n_alpa) * $d_perkiraan;
                    }
                    // data forecasting buat perkiraan berikutnya
                    if ($key === count($item_obat) - 1) {
                        if ($key < 1) {
                            $d_perkiraan = $item_obat[0]->d_aktual;
                        } else {
                            $d_perkiraan = ($n_alpa * $item_obat[$key]->d_aktual) + (1 - $n_alpa) * $d_perkiraan;
                        }
                    }
                    // berdasarkan kd obatnya / karena digroup td
                    $array_perkiraan[$key_obat] = [
                        'kd_obat' => $key_obat,
                        'nama_obat' => $item->nama_obat,
                        'jenis_satuan' => $item->jenis_satuan,
                        'forecasting' => number_format($d_perkiraan, 2),
                    ];
                }
            }
            $data = [
                'title' => 'Forecasting',
                "tampil" => $array_perkiraan,
            ];

            return view('forecasting.index', $data);
        } catch (\Throwable $th) {
            return redirect('forecasting')->with('gagal', 'Masukan Data Obat dan Aktual terlebih dahulu');
        }
    }

    public function cetak()
    {
        try {
            $obat = DB::select(DB::raw('SELECT * FROM aktual RIGHT JOIN obat ON obat.kd_obat = aktual.kd_obat'));
            $d_perkiraan = 0;
            $n_alpa = 0.1;
            $array_perkiraan = [];
            $obatbaru = [];

            foreach ($obat as $key => $item) {
                if (empty($obatbaru[$item->kd_obat])) {
                    $obatbaru[$item->kd_obat] = [];
                }
                $obatbaru[$item->kd_obat][] = $item;
            }
            foreach ($obatbaru as $key_obat => $item_obat) {
                foreach ($item_obat as $key => $item) {
                    if ($key < 2) {
                        $d_perkiraan = $item_obat[0]->d_aktual;
                    } else {
                        $d_perkiraan = ($n_alpa * $item_obat[$key - 1]->d_aktual) + (1 - $n_alpa) * $d_perkiraan;
                    }
                    if ($key === count($item_obat) - 1) {
                        if ($key < 1) {
                            $d_perkiraan = $item_obat[0]->d_aktual;
                        } else {
                            $d_perkiraan = ($n_alpa * $item_obat[$key]->d_aktual) + (1 - $n_alpa) * $d_perkiraan;
                        }
                    }
                    $array_perkiraan[$key_obat] = [
                        'kd_obat' => $key_obat,
                        'nama_obat' => $item->nama_obat,
                        'jenis_satuan' => $item->jenis_satuan,
                        'forecasting' => number_format($d_perkiraan, 2),
                    ];
                }
            }
            $data = [
                'title' => 'Cetak Laporan Forecasting',
                "tampil" => $array_perkiraan,
            ];

            $bulan = date('F', strtotime(date('F') . '+ 1 f'));
            $tahun = date('His-Ymd');;
            $date = $bulan . ' - ' . $tahun;
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('forecasting.cetak', $data);
            $pdf->setPaper('A4', 'potrait');
            return $pdf->stream('forecasting - ' . $date . '.pdf');
        } catch (\Throwable $th) {
            return redirect('forecasting')->with('gagal', 'Data Forecasting Gagal Dicetak');
        }
    }

    public function show($kd_obat)
    {
        try {
            $obat = Obat::findOrFail($kd_obat);
            $querytampil = Aktual::where('kd_obat', $kd_obat)->get();
            $d_perkiraan = 0;
            $n_alpa = 0.1;
            $count = $querytampil->count();

            for ($i = 0; $i <= $count; $i++) {
                if ($i < 2) {
                    $d_perkiraan = $querytampil[0]['d_aktual'];
                } else {
                    $d_perkiraan = ($n_alpa * $querytampil[$i - 1]['d_aktual']) + (1 - $n_alpa) * $d_perkiraan;
                }
                $array_perkiraan[] = number_format($d_perkiraan, 2);
            }

            $data = [
                'title' => 'Forecasting Data',
                'obat'=> $obat,
                "tampil" => $querytampil,
                "array_perkiraan" => $array_perkiraan,
                "d_perkiraan" => number_format($d_perkiraan, 2),
            ];

            return view('forecasting.show', $data);
        } catch (\Throwable $th) {
            return redirect('obat')->with('gagal', 'Masukan Data Aktual terlebih dahulu');
        }
    }
}
