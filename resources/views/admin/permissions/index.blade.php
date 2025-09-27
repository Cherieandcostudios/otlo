@extends('layouts.admin')
@section('title','Permissions')
@section('content')
<div class="flex justify-between mb-3">
    <h2 class="text-xl font-semibold">Permissions</h2>
    <button class="btn-theme px-3 py-2 rounded" onclick="document.getElementById('createPermissionModal').showModal()">New Permission</button>
  </div>
<div class="bg-white border rounded">
  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 whitespace-nowrap">
      <thead class="bg-gray-50"><tr><th class="p-2 text-left">Name</th><th class="p-2">Action</th></tr></thead>
      <tbody>
      @foreach($permissions as $permission)
        <tr class="border-t">
          <td class="p-2">{{ $permission->name }}</td>
          <td class="p-2 text-right">
            <a class="text-theme" href="{{ route('admin.permissions.edit', $permission) }}">Edit</a>
            <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button class="text-red-600 ml-2">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <div class="p-2">{{ $permissions->links() }}</div>
</div>

<dialog id="createPermissionModal" class="rounded-lg p-0">
  <form method="POST" action="{{ route('admin.permissions.store') }}" class="bg-white rounded-lg p-4 w-[92vw] md:w-[520px]">
    @csrf
    <div class="text-lg font-semibold mb-3">Create Permission</div>
    <div class="mb-2">
      <label class="block text-sm">Name</label>
      <input class="w-full border rounded p-2" type="text" name="name" required>
    </div>
    <div class="flex items-center justify-end gap-2">
      <button type="button" class="px-3 py-2" onclick="document.getElementById('createPermissionModal').close()">Cancel</button>
      <button class="btn-theme px-3 py-2 rounded">Create</button>
    </div>
  </form>
</dialog>
@endsection


