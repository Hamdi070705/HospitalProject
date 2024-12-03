@use(Carbon\Carbon)

@extends('layouts.admin.layout')

@section('title')

@section('content')
<div class="bg-white p-24 rounded-3xl shadow-lg flex-1 ml-64 w-full" style="transform: translateX(125px)">
    <div class="mb-8 flex justify-between items-center">
        <h2 class="text-xl text-txt font-semibold">Dokter Total:  {{$dokterCount}}</h2>
        <button id="createAccountBtn"
            class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 transition duration-300" style="transform: translateX(313px)">
            Create New Account
        </button>
        
        </div>
    {{-- Tabel Dokter --}}
    <section class="mb-8">
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg shadow-sm w-custom">
                <thead class="bg-gray-100 text-txt text-sm">
                    <tr>
                        <th class="py-3 px-6 text-left">NAMA</th>
                        <th class="py-3 px-6 text-left">EMAIL</th>
                        <th class="py-3 px-6 text-left">ACTION</th>
                    </tr>
                </thead>
                <tbody class="text-txt text-sm divide-y divide-gray-200">
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td class="py-3 px-6">{{ $doctor->name }}</td>
                            <td class="py-3 px-6">{{ $doctor->email }}</td>
                            <td class="py-3 px-6">
                                <div class="flex flex-col sm:flex-row gap-2 justify-center items-center">
                                    <button
                                        class="w-full sm:w-auto bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 transform hover:scale-105 transition-all duration-300"
                                        onclick="editUser({{ $doctor->id }}, '{{ $doctor->name }}', '{{ $doctor->email }}', '{{ $doctor->role }}')">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <form action="{{ route('users.destroy', $doctor->id) }}" method="POST" class="w-full sm:w-auto">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transform hover:scale-105 transition-all duration-300"
                                            onclick="return confirm('Are you sure to delete this doctor?')">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

{{-- Modal --}}
<div id="userModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 shadow-md w-full max-w-lg">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h3 id="modalTitle" class="text-xl font-bold">Create New Account</h3>
            <button id="closeModalBtn" class="text-gray-500 hover:text-gray-800">&times;</button>
        </div>
        <form id="userForm" method="POST" action="{{ route('users.store') }}">
            @csrf
            <input type="hidden" id="userId" name="id">
            <input type="hidden" name="role" value="dokter">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="name">Name</label>
                <input type="text" name="name" id="name" class="w-full border rounded-lg p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" class="w-full border rounded-lg p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="password">Password</label>
                <input type="password" name="password" id="password" class="w-full border rounded-lg p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="role">Role</label>
                <select name="role" id="role" class="w-full border rounded-lg p-2">
                    <option value="dokter">dokter</option>
                    <option value="pasien">Patient</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
</main>

<script>
// Modal toggle functionality
const userModal = document.getElementById('userModal');
document.getElementById('createAccountBtn').addEventListener('click', () => {
    resetModal();
    userModal.classList.remove('hidden');
});
document.getElementById('closeModalBtn').addEventListener('click', () => {
    userModal.classList.add('hidden');
});

function editUser(id, name, email, role) {
    resetModal();
    document.getElementById('modalTitle').textContent = 'Edit User';
    document.getElementById('userForm').setAttribute('action', `/admin/user/${id}`);
    document.getElementById('userForm').insertAdjacentHTML('beforeend',
        '<input name="_method" value="PUT" type="hidden">');
    document.getElementById('userId').value = id;
    document.getElementById('name').value = name;
    document.getElementById('email').value = email;
    document.getElementById('role').value = role;
    userModal.classList.remove('hidden');
}

function resetModal() {
    document.getElementById('modalTitle').textContent = 'Create New Account';
    document.getElementById('userForm').reset();
    document.getElementById('userForm').setAttribute('action', "{{ route('users.store') }}");
    document.querySelector('[name="_method"]')?.remove();
}
</script>
@endsection