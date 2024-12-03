<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function doctorView() {
        if (Auth::check())
        {   $doctors = User::where('role', 'dokter')
            ->with('doctorSchedules.schedule')
            ->orderBy('name', 'asc')
            ->get();

            $dokterCount = User::where('role', 'dokter')->count();
            return view('admin.doctor_list', compact('doctors', 'dokterCount'));
        } 
    }

    public function patientView() {
        if (Auth::check())
        {   $patients = User::where('role', 'pasien')
            ->orderBy('name', 'asc')
            ->get();

            $pasienCount = User::where('role', 'pasien')->count();
            return view('admin.patient_list', compact('patients', 'pasienCount'));
        }
  
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:dokter,pasien',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);


        return redirect()->back()->with('success', 'User created successfully!');
    }

    // Update data user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:6'],
            'role' => ['required', 'in:dokter,pasien'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'Account updated successfully.');
    }

    // Hapus data user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'Account deleted successfully.');
    }
}
