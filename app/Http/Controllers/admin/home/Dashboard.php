<?php

namespace App\Http\Controllers\admin\home;

use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function dashboard()
    {
        return view('e-commerce.admin.home.dashboard');
    }
}
