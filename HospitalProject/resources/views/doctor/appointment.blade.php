@extends('layouts.doctor.layout')

@section('title', 'Appointments')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-2xl text-txt font-semibold mb-6">Manage Appointments</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <div class="max-h-[700px] overflow-y-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-txt sticky top-0 z-50">
                        <tr>
                            <th class="px-6 py-3 text-left">Patient</th>
                            <th class="px-6 py-3 text-left">Service</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td class="px-6 py-4">{{ $appointment->user->name }}</td>
                                <td class="px-6 py-4">{{ $appointment->service->nama_layanan }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 rounded-full text-sm
                            @if ($appointment->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($appointment->status == 'approved') bg-blue-100 text-blue-800
                            @else bg-green-100 text-green-800 @endif">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $appointment->tanggal_periksa ?? 'Not set' }}</td>
                                <td class="px-6 py-4">
                                    <button onclick="openApproveModal({{ $appointment->id }})"
                                        class="px-4 py-2 bg-blue-500 text-white rounded mb-2">
                                        Approve
                                    </button>
                                    <button onclick="openDiagnosisModal({{ $appointment->id }})"
                                        class="px-4 py-2 bg-green-500 text-white rounded">
                                        Add Diagnosis
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Approve Modal -->
        <div id="approveModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Set Appointment Date</h3>
                    <form id="approveForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Appointment Date:</label>
                            <input type="datetime-local" name="appointment_date" class="w-full px-3 py-2 border rounded"
                                value={{ date('Y-m-d\TH:i', strtotime(now())) }} required>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" onclick="closeApproveModal()"
                                class="mr-2 px-4 py-2 bg-gray-300 rounded">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Approve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Diagnosis Modal -->
        <div id="diagnosisModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Add Diagnosis</h3>
                    <form id="diagnosisForm" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Diagnosis Code:</label>
                            <input type="text" name="diagnosis_code" class="w-full px-3 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea name="description" class="w-full px-3 py-2 border rounded" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Medicine:</label>
                            <select name="id_obat" class="w-full px-3 py-2 border rounded" required>
                                @foreach ($medicines as $medicine)
                                    <option value="{{ $medicine->id }}">{{ $medicine->nama_obat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Medical Action:</label>
                            <input type="text" name="tindakan_medis" class="w-full px-3 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Medical History:</label>
                            <textarea name="riwayat_penyakit" class="w-full px-3 py-2 border rounded" required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" onclick="closeDiagnosisModal()"
                                class="mr-2 px-4 py-2 bg-gray-300 rounded">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentAppointmentId = null;

        document.addEventListener('DOMContentLoaded', function() {
            // Debug
            console.log('DOM Loaded');

            // Test modal elements exist
            console.log('Approve Modal:', document.getElementById('approveModal'));
            console.log('Diagnosis Modal:', document.getElementById('diagnosisModal'));
        });

        function openApproveModal(appointmentId) {
            // Log appointmentId untuk debug
            console.log('Opening approve modal for appointment:', appointmentId);
            currentAppointmentId = appointmentId;
            document.getElementById('approveModal').style.display = 'block';
            // console.log('Current appointment ID:', currentAppointmentId);
            // document.getElementById('approveForm').action =
            document.getElementById('approveForm').action = "{{ route('doctor.appointments.approve', ':appointmentId') }}"
                .replace(':appointmentId', currentAppointmentId);
        }

        function closeApproveModal() {
            document.getElementById('approveModal').style.display = 'none';
        }

        function openDiagnosisModal(appointmentId) {
            console.log('Opening diagnosis modal for appointment:', appointmentId);
            currentAppointmentId = appointmentId;
            document.getElementById('diagnosisModal').style.display = 'block';
            document.getElementById('diagnosisForm').action =
                "{{ route('doctor.appointments.diagnosis', ':appointmentId') }}".replace(':appointmentId',
                    currentAppointmentId);
        }

        function closeDiagnosisModal() {
            document.getElementById('diagnosisModal').style.display = 'none';
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            let approveModal = document.getElementById('approveModal');
            let diagnosisModal = document.getElementById('diagnosisModal');

            if (event.target == approveModal) {
                closeApproveModal();
            }
            if (event.target == diagnosisModal) {
                closeDiagnosisModal();
            }
        }
    </script>
@endsection
