<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminHome(){
        return view('admin_dashboard.dashboard');
    }
}
