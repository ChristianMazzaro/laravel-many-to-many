<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

//helpers
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){

        $user = Auth::user();
        $userId = Auth::id();
        return view('admin.dashboard');
    }
}
