<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Obat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $obat = Obat::all()->count();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'users' => $user,
            'obat' => $obat,
        ]);
    }
}
