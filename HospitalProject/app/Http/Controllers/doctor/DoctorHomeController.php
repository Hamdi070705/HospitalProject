<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use App\Models\ServicesGroup;
use App\Models\ServicesList;
use Illuminate\Support\Facades\Auth;

class DoctorHomeController extends Controller {
    public function index() {
        if (Auth::check() && Auth::user()->role == 'dokter') {
            $recentPatients = ServicesGroup::with(['user', 'diagnosis'])
                ->whereHas('service', function($query) {
                    $query->where('id_dokter', Auth::id());
                })
                ->where('status', 'completed')
                ->orderBy('updated_at', 'desc')
                ->take(5)
                ->get();

            return view('doctor.home', compact('recentPatients'));
        }
        return view('welcome');
    }
}