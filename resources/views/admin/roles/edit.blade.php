@extends('layouts.admin')
@section('title','Edit Role')
@section('content')
<form method="POST" action="{{ route('admin.roles.update', $role) }}" class="bg-white border rounded p-4 space-y-4">
  @csrf @method('PUT')
  <div>
    <label class="block text-sm">Name</label>
    <input name="name" value="{{ old('name', $role->name) }}" class="mt-1 w-full border rounded p-2" />
    @error('name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
  </div>
  <div>
    <label class="block text-sm mb-1">Permissions</label>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
      @foreach($permissions as $permission)
        <label class="flex items-center gap-2">
          <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" @checked(in_array($permission->name, $rolePermissions))>
          <span>{{ $permission->name }}</span>
        </label>
      @endforeach
    </div>
  </div>
  <div>
    <button class="btn-theme px-4 py-2 rounded">Update</button>
    <a href="{{ route('admin.roles.index') }}" class="ml-2">Cancel</a>
  </div>
</form>
@endsection


