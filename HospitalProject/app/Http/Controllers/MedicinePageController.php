<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicinePageController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('admin.medicine.index', compact('medicines'));
    }

    public function create()
    {   
        // $medicines = Medicine::all();
        return view('admin.medicine.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|string|max:255',
            'nama_obat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tipe_obat' => 'required|in:keras,biasa',
            'stok' => 'required|integer',
            'gambar_obat' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'expiry_date' => 'required|date|after:today',
        ]);

        // return dd($request->all());

        $path = $request->file('gambar_obat')->store('images', 'public');

        Medicine::create([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'deskripsi' => $request->deskripsi,
            'tipe_obat' => $request->tipe_obat,
            'stok' => $request->stok,
            'gambar_obat' => $path,
            'expiry_date' => $request->expiry_date,  // Add this line
        ]);

        return redirect()->route('medicines.index');
    }

    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('admin.medicine.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        $request->validate([
            'kode_obat' => 'required|string|max:255',
            'nama_obat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tipe_obat' => 'required|in:keras,biasa',
            'stok' => 'required|integer',
            'gambar_obat' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'expiry_date' => 'required|date',
        ]);

        $data = $request->except(['_token', '_method', 'gambar_obat']);

        if ($request->hasFile('gambar_obat')) {
            // Delete old image if exists
            if ($medicine->gambar_obat && Storage::disk('public')->exists($medicine->gambar_obat)) {
                Storage::disk('public')->delete($medicine->gambar_obat);
            }

            $data['gambar_obat'] = $request->file('gambar_obat')->store('images', 'public');
        }

        $medicine->update($data);
        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicines.index');
    }
}