<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view permissions', ['only' => ['index']]);
        $this->middleware('permission:create permissions', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit permissions', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete permissions', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions = Permission::paginate(20);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255|unique:permissions,name']);
        Permission::create(['name' => $validated['name']]);
        return redirect()->route('admin.permissions.index')->with('status', 'Permission created');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => 'required|string|max:255|unique:permissions,name,'.$permission->id]);
        $permission->update(['name' => $validated['name']]);
        return redirect()->route('admin.permissions.index')->with('status', 'Permission updated');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('status', 'Permission deleted');
    }
}


