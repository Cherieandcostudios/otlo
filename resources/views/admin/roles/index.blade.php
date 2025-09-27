@extends('layouts.admin')
@section('title','Roles')
@section('content')
<div class="flex justify-between mb-3">
    <h2 class="text-xl font-semibold">Roles</h2>
    <button class="btn-theme px-3 py-2 rounded" onclick="document.getElementById('createRoleModal').showModal()">New Role</button>
  </div>
<link rel="stylesheet" href="{{ asset('css/responsive-tables.css') }}">
<div style="background: white; border: 1px solid #e5e7eb; border-radius: 8px;">
  <div class="table-responsive">
    <table class="responsive-table">
      <thead><tr><th>Name</th><th>Permissions</th><th>Action</th></tr></thead>
      <tbody>
      @foreach($roles as $role)
        <tr>
          <td>{{ $role->name }}</td>
          <td>{{ $role->permissions_count }}</td>
          <td style="text-align: right;">
            <a style="color: var(--brand);" href="{{ route('admin.roles.edit', $role) }}">Edit</a>
            @if($role->name !== 'Admin')
            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display: inline; margin-left: 8px;">
              @csrf @method('DELETE')
              <button style="color: #ef4444; background: none; border: none; cursor: pointer;">Delete</button>
            </form>
            @endif
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <div style="padding: 8px;">{{ $roles->links() }}</div>
</div>

<dialog id="createRoleModal" class="rounded-lg p-0">
  <form method="POST" action="{{ route('admin.roles.store') }}" class="bg-white rounded-lg p-4 w-[92vw] md:w-[520px]">
    @csrf
    <div class="text-lg font-semibold mb-3">Create Role</div>
    <div class="mb-2">
      <label class="block text-sm">Name</label>
      <input class="w-full border rounded p-2" type="text" name="name" required>
    </div>
    <div class="mb-3">
      <label class="block text-sm mb-1">Permissions</label>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-2 max-h-40 overflow-auto border rounded p-2">
        @foreach(\Spatie\Permission\Models\Permission::all() as $permission)
          <label class="flex items-center gap-2"><input type="checkbox" name="permissions[]" value="{{ $permission->name }}"> <span>{{ $permission->name }}</span></label>
        @endforeach
      </div>
    </div>
    <div class="flex items-center justify-end gap-2">
      <button type="button" class="px-3 py-2" onclick="document.getElementById('createRoleModal').close()">Cancel</button>
      <button class="btn-theme px-3 py-2 rounded">Create</button>
    </div>
  </form>
</dialog>
@endsection


