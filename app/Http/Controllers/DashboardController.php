<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $isAdmin = Auth()->user()->isAdmin;
        if($isAdmin==1)
        {
            return view('admin.dashboard');

        }
        else{
            return view('dashboard');

        }
    }
}
