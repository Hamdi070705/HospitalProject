<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\ServicesGroup;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = ServicesGroup::with(['user', 'service', 'diagnosis'])
            ->whereHas('service', function($query) {
                $query->where('id_dokter', Auth::id());
            })
            ->orderByRaw('ISNULL(tanggal_periksa) DESC, tanggal_periksa DESC')
            ->get();

        $medicines = \App\Models\Medicine::all();

        return view('doctor.appointment', compact('appointments', 'medicines'));
    }

    public function approve(Request $request, ServicesGroup $servicesGroup)
    {
        $request->validate([
            'appointment_date' => 'required|date|after:today'
        ]);

        $servicesGroup->update([
            'status' => 'approved',
            'tanggal_periksa' => $request->appointment_date
        ]);

        // $servicesGroup->update($request->all());

        return back()->with('success', 'Appointment approved successfully');
    }

    public function complete(ServicesGroup $servicesGroup)
    {
        if (!$servicesGroup->diagnosis) {
            return back()->with('error', 'Cannot complete appointment without diagnosis');
        }

        $servicesGroup->update(['status' => 'completed']);
        return back()->with('success', 'Appointment marked as completed');
    }

    public function storeDiagnosis(Request $request, ServicesGroup $servicesGroup)
    {
        $request->validate([
            'diagnosis_code' => 'required',
            'description' => 'required',
            'id_obat' => 'required|exists:medicines,id',
            'tindakan_medis' => 'required',
            'riwayat_penyakit' => 'required'
        ]);

        $diagnosis = Diagnosis::create([
            'diagnosis_code' => $request->diagnosis_code,
            'diagnosis_date' => now(),
            'id_obat' => $request->id_obat,
            'description' => $request->description,
            'tindakan_medis' => $request->tindakan_medis,
            'riwayat_penyakit' => $request->riwayat_penyakit
        ]);

        $servicesGroup->update([
            'id_diagnosis' => $diagnosis->id
        ]);

        $servicesGroup->update([
            'status' => 'completed',
        ]);

        \App\Models\MedicalRecord::create([
            'id_diagnosis' => $diagnosis->id
        ]);

        return back()->with('success', 'Diagnosis added successfully');
    }
}