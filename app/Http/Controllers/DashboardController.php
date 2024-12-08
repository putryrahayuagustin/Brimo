<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Rekening;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role', "user")->get();
        $rekenings = Rekening::all();
        return view('dashboard', compact('users', 'rekenings'));
    }

    
}
