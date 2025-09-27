@extends('layouts.admin')
@section('title','Edit User')
@section('content')
<form method="POST" action="{{ route('admin.users.update', $user) }}" class="bg-white border rounded p-4 space-y-4">
  @csrf @method('PUT')
  <div>
    <div class="text-sm text-gray-500">Name</div>
    <div class="mt-1 font-semibold">{{ $user->name }}</div>
    <div class="text-sm text-gray-500 mt-2">Email</div>
    <div class="mt-1">{{ $user->email }}</div>
  </div>
  <div>
    <label class="block text-sm mb-1">Roles</label>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
      @foreach($roles as $role)
        <label class="flex items-center gap-2">
          <input type="checkbox" name="roles[]" value="{{ $role->name }}" @checked(in_array($role->name, $userRoleNames))>
          <span>{{ $role->name }}</span>
        </label>
      @endforeach
    </div>
  </div>
  <div>
    <label class="block text-sm mb-1">Permissions</label>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
      @foreach($permissions as $permission)
        <label class="flex items-center gap-2">
          <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" @checked(in_array($permission->name, $userPermissionNames))>
          <span>{{ $permission->name }}</span>
        </label>
      @endforeach
    </div>
  </div>
  <div>
    <button class="btn-theme px-4 py-2 rounded">Update</button>
    <a href="{{ route('admin.users.index') }}" class="ml-2">Cancel</a>
  </div>
</form>
@endsection


