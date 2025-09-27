@extends('layouts.admin')
@section('title','Edit Permission')
@section('content')
<form method="POST" action="{{ route('admin.permissions.update', $permission) }}" class="bg-white border rounded p-4 space-y-4">
  @csrf @method('PUT')
  <div>
    <label class="block text-sm">Name</label>
    <input name="name" value="{{ old('name', $permission->name) }}" class="mt-1 w-full border rounded p-2" />
    @error('name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
  </div>
  <div>
    <button class="btn-theme px-4 py-2 rounded">Update</button>
    <a href="{{ route('admin.permissions.index') }}" class="ml-2">Cancel</a>
  </div>
</form>
@endsection


