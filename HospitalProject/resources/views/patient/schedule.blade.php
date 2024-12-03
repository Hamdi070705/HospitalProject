@extends('layouts.patient.layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-txt mb-8 text-center tracking-wide">
           Jadwal Dr. {{ $doctor->name }}
        </h2>

        <div class="max-w-2xl mx-auto">
            @if ($schedules->isEmpty())
                <div class="bg-blue-50  p-4 rounded-lg">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-3" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-txt">Tidak Ada Jadwal Yang Tersedia Untuk Dokter Ini</p>
                    </div>
                </div>
            @else
                <form action="{{ route('patient.book') }}" method="POST"
                    class="bg-white shadow-xl rounded-xl p-6">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <input type="hidden" name="service_id" value="{{ $serviceId }}">

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-txt mb-4">Pilih Jadwal</h3>

                        <div class="space-y-3">
                            @foreach ($schedules as $schedule)
                                <label class="block relative">
                                    <input type="radio" name="schedule_id" value="{{ $schedule->id }}"
                                        class="absolute top-0 left-0 opacity-0 peer" required>
                                    <div
                                        class="
                                        w-full p-4 border rounded-lg cursor-pointer
                                        transition duration-300 ease-in-out
                                        peer-checked:bg-primary peer-checked:text-white
                                        hover:bg-gray-100
                                        flex items-center justify-between
                                    ">
                                        <span>{{ $schedule->hari }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 opacity-0 peer-checked:opacity-100" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </label>
                            @endforeach
                        </div>

                        <button type="submit"
                            class="
                                w-full mt-6 py-3 bg-primary text-white rounded-lg
                                hover:bg-buttonH transition duration-300 ease-in-out
                                transform hover:-translate-y-1 hover:shadow-lg
                                focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50
                            ">
                            Pilih Jadwal
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Inter', sans-serif;
        }
    </style>
@endsection
