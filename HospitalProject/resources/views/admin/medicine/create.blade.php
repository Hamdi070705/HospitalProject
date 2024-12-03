@extends('layouts.admin.layout')

@section('title')
    Create New Medicine
@endsection

@section('content')
<div class="p-4 sm:ml-96"> <!-- Added margin-left to account for sidebar -->
    <div class="p-4"> <!-- Added top margin to account for navbar -->
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-5xl mx-auto"> <!-- Increased max-width -->
            <h1 class="text-2xl font-bold mb-6 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent" style="transform: translateX(313px)">
                Create New Medicine
            </h1>
            <p class="text-gray-600 mb-6">Fill in the details to add a new medicine</p>

            <form action="{{ route('medicines.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6"> <!-- Changed to 3-column grid layout -->
                    <div class="lg:col-span-1">
                        <label for="kode_obat" class="block text-sm font-medium text-gray-700">Medicine Code</label>
                        <input type="text" name="kode_obat" id="kode_obat"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="lg:col-span-1">
                        <label for="nama_obat" class="block text-sm font-medium text-gray-700">Medicine Name</label>
                        <input type="text" name="nama_obat" id="nama_obat"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="lg:col-span-1">
                        <label for="tipe_obat" class="block text-sm font-medium text-gray-700">Medicine Type</label>
                        <select name="tipe_obat" id="tipe_obat"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                            <option value="keras">Keras</option>
                            <option value="biasa">Biasa</option>
                        </select>
                    </div>

                    <div class="lg:col-span-1">
                        <label for="stok" class="block text-sm font-medium text-gray-700">Stock</label>
                        <input type="number" name="stok" id="stok"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="lg:col-span-2">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required></textarea>
                    </div>

                    <div class="lg:col-span-1">
                        <label for="gambar_obat" class="block text-sm font-medium text-gray-700">Medicine Image</label>
                        <input type="file" name="gambar_obat" id="gambar_obat"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                            required>
                    </div>

                    <div class="lg:col-span-1">
                        <label for="expiry_date" class="text-sm font-medium text-gray-700">Expiry Date</label>
                        <input type="date" name="expiry_date" id="expiry_date"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                            required>
                    </div>

                    <div class="lg:col-span-3 flex justify-end space-x-3"> <!-- Span all columns -->
                        <a href="{{ route('medicines.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                            Save Medicine
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
