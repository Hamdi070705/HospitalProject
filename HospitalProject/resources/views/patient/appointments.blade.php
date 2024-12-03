@extends('layouts.patient.layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-txt mb-8 text-center tracking-wide">Konsultasi Saya</h2>

        <div class="max-w-4xl mx-auto">
            <div class="max-h-[900px] overflow-y-auto">
                @forelse ($appointments as $appointment)
                    <div
                        class="bg-white shadow-lg rounded-xl overflow-hidden mb-6 border-l-4
                {{ $appointment->status === 'pending'
                    ? 'border-yellow-500'
                    : ($appointment->status === 'approved'
                        ? 'border-blue-500'
                        : ($appointment->status === 'completed'
                            ? 'border-green-500'
                            : 'border-red-500')) }}">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-semibold text-txt">
                                        {{ $appointment->service->nama_layanan }}
                                    </h3>
                                    <p class="text-gray-600">
                                        dr. {{ $appointment->service->doctor->name ?? 'Not Assigned' }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="px-4 py-2 rounded-full text-sm font-semibold
                                {{ $appointment->status === 'pending'
                                    ? 'bg-yellow-100 text-yellow-800'
                                    : ($appointment->status === 'approved'
                                        ? 'bg-blue-100 text-blue-800'
                                        : ($appointment->status === 'completed'
                                            ? 'bg-green-100 text-green-800'
                                            : 'bg-red-100 text-red-800')) }}">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mt-4 text-sm">
                                <div>
                                    <p class="text-gray-600">Tanggal Periksa:</p>
                                    <p class="font-semibold text-txt">
                                        {{ $appointment->tanggal_periksa ?? 'The check-up date will appear once the doctor approves the appointment.' }}
                                    </p>
                                </div>
                                @if ($appointment->id_diagnosis)
                                    <div>
                                        <p class="text-gray-600">ID Diagnosis   :</p>
                                        <p class="font-semibold text-txt">#{{ $appointment->id_diagnosis }}</p>
                                    </div>
                                @endif
                            </div>
                            @if ($appointment->status === 'completed')
                                <div class="mt-4 text-right">
                                    <a href="{{ route('patient.medical-records.index') }}"
                                        class="gradient-button bg-icon px-4 py-2 rounded-full text-white hover:bg-iconHH">
                                        View Medical Records
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 bg-white rounded-xl shadow">
                        <p class="text-gray-500">No appointments found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
