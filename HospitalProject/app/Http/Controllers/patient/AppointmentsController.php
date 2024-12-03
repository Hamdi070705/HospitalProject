<?php
namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ServicesGroup;

class AppointmentsController extends Controller
{
    public function index()
    {
        $appointments = ServicesGroup::with(['service.doctor', 'diagnosis'])
        ->where('id_user', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();


        return view('patient.appointments', compact('appointments'));
    }
}
