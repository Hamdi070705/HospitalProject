<?php
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Doctor\AppointmentController;
use App\Http\Controllers\Doctor\DoctorHomeController;
use App\Http\Controllers\DoctorList;
use App\Http\Controllers\DoctorListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicinePageController;
use App\Http\Controllers\Patient\AppointmentsController;
use App\Http\Controllers\Patient\MedicalRecordsController;
use App\Http\Controllers\Patient\PatientHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::match(['get', 'post', 'put'], 'doctorlist', [UserController::class, 'doctorView'])->name('doctorlist');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::put('admin/user/{user}', [UserController::class, 'update'])->name('users.update'); // Changed from users to user
    Route::delete('/admin/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::match(['get', 'post', 'put'], 'patientlist', [UserController::class, 'patientView'])->name('patientlist');
    Route::get('doctorlist', [UserController::class, 'doctorView'])->name('users.doctorView');
    Route::get('patientlist', [UserController::class, 'patientView'])->name('users.patientView');
    Route::resource('/medicines', MedicinePageController::class);
});

Route::middleware(['auth', 'role:pasien'])->prefix('patient')->name('patient.')->group(function () {
    Route::get('home', [PatientHomeController::class, 'index'])->name('home.index');
    Route::get('services/{service}/doctors', [PatientHomeController::class, 'showDoctors'])->name('doctors');
    Route::get('doctor/{doctor}/schedule', [PatientHomeController::class, 'showSchedule'])->name('schedule');
    Route::post('book-appointment', [PatientHomeController::class, 'bookAppointment'])->name('book');
    Route::get('appointments', [AppointmentsController::class, 'index'])->name('appointments');
    Route::get('medical-records', [MedicalRecordsController::class, 'index'])->name('medical-records.index');
});

Route::middleware(['auth', 'role:dokter'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('home', [DoctorHomeController::class, 'index'])->name('home.index');
    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::put('appointments/{servicesGroup}/approve', [AppointmentController::class, 'approve'])->name('appointments.approve');
    Route::put('appointments/{servicesGroup}/complete', [AppointmentController::class, 'complete'])->name('appointments.complete');
    Route::post('appointments/{servicesGroup}/diagnosis', [AppointmentController::class, 'storeDiagnosis'])->name('appointments.diagnosis');
});

 // Ensure this line is added

require __DIR__.'/auth.php';
