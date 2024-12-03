@extends('layouts.admin.layout')

@section('title')

@section('content')
<div class="bg-white p-6 rounded-3xl shadow-lg flex-1 ml-52" style="transform: translateX(125px)">
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-xl text-txt font-semibold">Daftar Obat</h1>
        <a href="{{ route('medicines.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg transition-all duration-300 transform hover:bg-blue-600 transition duration-300" style="transform: translateX(313px)">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Create New Medicine
                </a>
        
        </div>
    {{-- Tabel Dokter --}}
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg max-w-[1200px] mx-auto">
        <!-- Existing table code -->
        <table class="w-full text-sm">
            <thead class="text-sm uppercase bg-gray-100 text-txt">
                <tr class="text-center">
                    <th class="px-3 py-3">Kode Obat</th>
                    <th class="px-3 py-3">Nama Obat</th>
                    <th class="px-3 py-3">Deskripsi</th>
                    <th class="px-3 py-3">Tipe Obat</th>
                    <th class="px-3 py-3">Stok</th>
                    <th class="px-3 py-3">Gambar Obat</th>
                    <th class="px-3 py-3">Expiry Date</th>
                    <th class="px-3 py-3">Status</th>
                    <th class="px-3 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicines as $medicine)
                    <tr class="bg-white border-b hover:bg-blue-50 transition-colors duration-200 medicine-row"
                        data-stock="{{ $medicine->stok }}" data-expiry="{{ $medicine->expiry_date }}">
                        <td class="px-3 py-3">{{ $medicine->kode_obat }}</td>
                        <td class="px-3 py-3 font-medium">{{ $medicine->nama_obat }}</td>
                        <td class="px-3 py-3 max-w-[200px] whitespace-normal break-words">
                            {{ $medicine->deskripsi }}
                        </td>
                        <td class="px-3 py-3">
                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $medicine->tipe_obat == 'keras'
                                    ? 'bg-red-100 text-red-800 border border-red-200'
                                    : 'bg-emerald-100 text-emerald-800 border border-emerald-200' }}">
                                {{ ucfirst($medicine->tipe_obat) }}
                            </span>
                        </td>
                        <td class="px-3 py-3 text-center">
                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium {{ $medicine->stok < 20 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                {{ $medicine->stok }}
                            </span>
                        </td>
                        <td class="px-3 py-3">
                            <img src="{{ Storage::url($medicine->gambar_obat) }}" alt="{{ $medicine->nama_obat }}"
                                class="w-10 h-10 rounded-lg object-cover shadow-sm hover:scale-110 transition-transform duration-300 cursor-pointer"
                                onclick="openImageModal('{{ Storage::url($medicine->gambar_obat) }}', '{{ $medicine->nama_obat }}')">
                        </td>
                        <td class="px-3 py-3 text-center">
                            @php
                                $expiryDate = strtotime($medicine->expiry_date);
                                $today = time();
                                $isExpired = $expiryDate < $today;
                                $daysUntilExpiry = ceil(($expiryDate - $today) / (60 * 60 * 24));
                            @endphp
                            <div class="flex flex-col space-y-1">
                                <span class="text-sm">
                                    {{ date('d M Y', strtotime($medicine->expiry_date)) }}
                                </span>
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-medium inline-block text-center w-24
                                    {{ $isExpired
                                        ? 'bg-red-100 text-red-800'
                                        : ($daysUntilExpiry <= 30
                                            ? 'bg-yellow-100 text-yellow-800'
                                            : 'bg-green-100 text-green-800') }}">
                                    {{ $isExpired ? 'Expired' : ($daysUntilExpiry <= 30 ? $daysUntilExpiry . ' days left' : 'Valid') }}
                                </span>
                            </div>
                        </td>
                        <td class="px-3 py-3">
                            <div class="flex justify-center">
                                @if ($medicine->stok == 0)
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 w-24 text-center">
                                        Out of Stock
                                    </span>
                                @elseif($medicine->stok < 20)
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 w-24 text-center">
                                        Low Stock
                                    </span>
                                @else
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 w-24 text-center">
                                        Available
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-3 py-3">
                            <div class="flex space-x-2">
                                <a href="{{ route('medicines.edit', $medicine->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <form action="{{ route('medicines.destroy', $medicine->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition-colors duration-200"
                                        onclick="return confirm('Are you sure you want to delete this medicine?')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Image Modal --}}
<div id="imageModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-4 rounded-lg max-w-2xl w-full mx-4">
        <div class="flex justify-between items-center mb-4">
            <h3 id="modalTitle" class="text-lg font-semibold text-gray-900"></h3>
            <button onclick="closeImageModal()" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <img id="modalImage" src="" alt="" class="w-full h-auto rounded-lg">
    </div>
</div>

<script>
    function openImageModal(imageUrl, imageTitle) {
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('modalTitle').innerText = imageTitle;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }
</script>

@endsection
