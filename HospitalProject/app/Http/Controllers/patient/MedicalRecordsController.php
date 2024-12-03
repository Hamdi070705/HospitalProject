<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use App\Models\ServicesGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRecordsController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 'pasien') {
            $user = Auth::user();

            $servicesGroups = ServicesGroup::with('diagnosis.medicalRecord')
                ->where('id_user', $user->id)
                ->where('status', 'completed')
                ->whereHas('diagnosis.medicalRecord')
                ->get();

            return view('patient.medical-records', compact('servicesGroups'));
        } else {
            return redirect()->route('login');
        }
    }
}