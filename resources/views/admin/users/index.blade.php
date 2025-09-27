@extends('layouts.admin')
@section('title','Users')
@section('content')
<div class="bg-white border rounded p-4">
  <div class="flex justify-between mb-3">
    <h2 class="text-xl font-semibold">Users</h2>
    <button class="btn-theme px-3 py-2 rounded" onclick="document.getElementById('createUserModal').showModal()">New User</button>
  </div>
  <div class="overflow-x-auto">
    <table id="users-table" class="min-w-full border border-gray-200 whitespace-nowrap display" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Permissions</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>

<dialog id="createUserModal" class="rounded-lg p-0">
  <form method="POST" action="{{ route('admin.users.store') }}" class="bg-white rounded-lg p-4 w-[92vw] md:w-[520px]">
    @csrf
    <div class="text-lg font-semibold mb-3">Create User</div>
    <div class="mb-2">
      <label class="block text-sm">Name</label>
      <input class="w-full border rounded p-2" type="text" name="name" required>
    </div>
    <div class="mb-2">
      <label class="block text-sm">Email</label>
      <input class="w-full border rounded p-2" type="email" name="email" required>
    </div>
    <div class="mb-2">
      <label class="block text-sm">Password</label>
      <input class="w-full border rounded p-2" type="password" name="password" required>
    </div>
    <div class="mb-3">
      <label class="block text-sm mb-1">Roles</label>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-2 max-h-40 overflow-auto border rounded p-2">
        @foreach($roles as $role)
          <label class="flex items-center gap-2"><input type="checkbox" name="roles[]" value="{{ $role->name }}"> <span>{{ $role->name }}</span></label>
        @endforeach
      </div>
    </div>
    <div class="flex items-center justify-end gap-2">
      <button type="button" class="px-3 py-2" onclick="document.getElementById('createUserModal').close()">Cancel</button>
      <button class="btn-theme px-3 py-2 rounded">Create</button>
    </div>
  </form>
</dialog>

@push('scripts')
<script>
$(function(){
  $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: @json(route('admin.users.data')),
      dataSrc: 'data'
    },
    columns: [
      { data: 'name' },
      { data: 'email' },
      { data: 'roles' },
      { data: 'permissions' },
      { data: 'action', orderable: false, searchable: false }
    ]
  });
});
</script>
@endpush
@endsection


