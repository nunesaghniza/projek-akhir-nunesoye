<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class ForecastingController extends Controller
{
    public function index()
    {
        $querytampil = Penjualan::all();
        $d_perkiraan = 0;
        $n_alpa = 0.1;
        $count = $querytampil->count();

        for ($i = 0; $i <= $count; $i++) {
            if ($i < 2) {
                $d_perkiraan = $querytampil[0]['d_aktual'];
            } else {
                $d_perkiraan = ($n_alpa * $querytampil[$i - 1]['d_aktual'] ) + (1 - $n_alpa) * $d_perkiraan;
            }
            $array_perkiraan[] = number_format($d_perkiraan, 2);
        }

        $data = [
            "tampil" => $querytampil,
            "array_perkiraan" => $array_perkiraan,
            "d_perkiraan" => number_format($d_perkiraan, 2),
        ];

        return view('forecasting', $data);
    }
}
