<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Medicine;
use App\Models\ServicesGroup;
use App\Models\ServicesList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\DoctorSchedule;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PatientHomeController extends Controller
{
    public function index() {
        if (Auth::check() && Auth::user()->role == 'pasien') {
            $services = ServicesList::all();
            $tindakan_medis_and_obat =  ServicesList::leftjoin('services_group', 'services_list.id', '=', 'services_group.id_services')
                                        ->leftjoin('diagnosis', 'services_group.id_diagnosis', '=', 'diagnosis.id')
                                        -> leftJoin('medicines', 'diagnosis.id_obat', '=', 'medicines.id')
                                        -> select('nama_layanan', 'tindakan_medis', 'nama_obat', 'services_group.tanggal_periksa')
                                        ->where('id_user', Auth::id())
                                        ->where('status', 'completed')
                                        ->get();
            return view('patient.home', compact('services', 'tindakan_medis_and_obat'));
        }
        return redirect('');
    }

    public function showDoctors($serviceId) {
        $service = ServicesList::findOrFail($serviceId);
        $doctors = User::where('role', 'dokter')
            ->whereHas('services', function($query) use ($serviceId) {
                $query->where('id', $serviceId);
            })->get();

        // Debug line - remove in production
        // \Log::info('Doctors found: ' . $doctors->count(), ['doctors' => $doctors->toArray()]);

        return view('patient.doctors', compact('doctors', 'service'));
    }

    public function showSchedule($doctorId) {
        $doctor = User::findOrFail($doctorId);
        $schedules = Schedule::whereHas('doctorSchedules', function($query) use ($doctorId) {
                        $query->where('dokter_id', $doctorId);
                    })
                    ->get();

        // Debug line - remove in production
        // \Log::info('Schedules found: ' . $schedules->count(), ['schedules' => $schedules->toArray()]);

        $serviceId = request()->query('service_id');

        return view('patient.schedule', compact('doctor', 'schedules', 'serviceId'));
    }

    public function bookAppointment(Request $request) {
        $request->validate([
            'service_id' => 'required|exists:services_list,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        ServicesGroup::create([
            'id_services' => $request->service_id,
            'id_user' => Auth::id(),
            'status' => 'pending'
        ]);

        return redirect()->route('patient.appointments')
            ->with('success', 'Appointment booked successfully!');

    }
}
