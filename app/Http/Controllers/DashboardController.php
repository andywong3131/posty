<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $user = auth()->user();
        
        return view('dashboard', [
            'user' => $user
        ]);
    }
}
