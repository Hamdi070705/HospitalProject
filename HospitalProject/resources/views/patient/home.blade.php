@extends('layouts.patient.layout')

@section('content')
    <div class="container mx-auto px-4 py-8 bg-">
        <h2 class="text-3xl font-bold text-txt mb-8 text-center tracking-wide">Layanan Yang Tersedia</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($services as $service)
                <div class="transform transition duration-300 ease-in-out hover:scale-105">
                    <div
                        class="bg-white shadow-xl rounded-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <h5 class="text-xl font-semibold text-txt tracking-wider">
                                    {{ $service->nama_layanan }}
                                </h5>
                                <p class="text-txt ml-20">4.5</p>
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.5 0L11.6329 6.56434H18.535L12.9511 10.6213L15.084 17.1857L9.5 13.1287L3.91604 17.1857L6.04892 10.6213L0.464963 6.56434H7.36712L9.5 0Z" fill="#FFB800"/>
                                    </svg>
                            </div>
                            <p class="text-gray-800 leading-relaxed">
                                {{ $service->deskripsi }}
                            </p>
                            <div class="pt-4 border-t border-gray-200">
                                <a href="{{ route('patient.doctors', $service->id) }}"
                                    class="block w-full text-center px-4 py-2 bg-primary text-white rounded-lg
                                          hover:bg-buttonH transition duration-300 ease-in-out
                                          transform hover:-translate-y-1 hover:shadow-lg
                                          focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    Pilih Layanan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-txt mb-8 text-center tracking-wide">Rekam Medis Anda dan Pemberian Obat</h2>
        @if ($tindakan_medis_and_obat->isEmpty())
            <p class="text-center text-txt">TIdak Ada Rekam Medis Tersedia</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($tindakan_medis_and_obat as $item)
                    <div class="transform transition duration-300 ease-in-out hover:scale-105">
                        <div
                            class="bg-white shadow-xl rounded-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                            <div class="p-6 space-y-4">
                                <div class="flex items-center justify-between">
                                    <h5 class="text-xl font-semibold text-txt tracking-wider">
                                        {{ $item->nama_layanan }}
                                    </h5>
                                </div>
                                <p class="text-gray-800 leading-relaxed">
                                    TIndakan Medis: {{ $item->tindakan_medis }}
                                </p>
                                <p class="text-gray-800 leading-relaxed">
                                    Obat: {{ $item->nama_obat }}
                                </p>
                                <p class="text-gray-800 leading-relaxed">
                                    Tanggal Pemeriksaan: {{ $item->tanggal_periksa }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <style>
        /* Custom CSS for additional refinement */
        body {
            background-color: #f4f7f6;
            font-family: 'Inter', sans-serif;
        }
    </style>
@endsection