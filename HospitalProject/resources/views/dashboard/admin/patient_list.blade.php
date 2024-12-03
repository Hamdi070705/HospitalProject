@use(Carbon\Carbon)

@extends('layouts.admin.layout')

@section('title')

@section('content')
<div class="bg-white p-24 rounded-3xl shadow-lg flex-1 ml-64 min-w-full" style="transform: translateX(125px)">
    <div class="flex justify-center mb-4">
    </div>
    {{-- Tabel Dokter --}}
    <section class="mb-8">
        <h2 class="text-xl text-txt font-semibold mb-4">Pasien Total:  {{$pasienCount}}</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg shadow-sm w-custom ">
                <thead class="bg-gray-100 text-txt text-sm">
                    <tr>
                        <th class="py-3 px-6 text-left">NAMA</th>
                        <th class="py-3 px-6 text-left">EMAIL</th>
                    </tr>
                </thead>
                <tbody class="text-txt text-sm divide-y divide-gray-200">
                    @foreach ($patients as $patient)
                        <tr>
                            <td class="py-3 px-6">{{ $patient->name }}</td>
                            <td class="py-3 px-6">{{ $patient->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
