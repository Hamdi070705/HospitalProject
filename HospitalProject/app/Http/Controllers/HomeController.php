<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Patient\PatientHomeController;
use App\Models\DoctorSchedule;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                $pasienCount = User::where('role', 'pasien')->count();
                $pasien = User::where('role', 'pasien')->latest()->paginate(10);

                $dokterCount = User::where('role', 'dokter')->count();
                $dokter = User::where('role', 'dokter')->latest()->paginate(10);
                // Mengatur locale Carbon ke Bahasa Indonesia
                Carbon::setLocale('id'); // 'id' untuk Bahasa Indonesia

                // Mendapatkan hari ini dalam bahasa Indonesia
                $today = Carbon::now()->translatedFormat('l'); // 'Senin', 'Selasa', dst.

                // Lakukan query untuk mendapatkan data dokter yang aktif hari ini
                $scheduleIds = Schedule::where('hari', $today)->pluck('id');
                $activeDoctorCount = DoctorSchedule::whereIn('schedule_id', $scheduleIds)
                    ->distinct('dokter_id')
                    ->count('dokter_id');

                return view('admin.home', compact('pasienCount', 'pasien', 'dokterCount', 'dokter', 'activeDoctorCount'));
            } else {
                return redirect('login');
            }
        }
    }
}
