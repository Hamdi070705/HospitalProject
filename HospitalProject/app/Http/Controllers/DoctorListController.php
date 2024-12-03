<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorList extends Controller
{
    public function index() {
        if (Auth::check())
        {
            return view('dashboard.admin.doctor_list');
        }
  
    }
}
