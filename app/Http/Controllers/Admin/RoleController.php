<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view roles', ['only' => ['index']]);
        $this->middleware('permission:create roles', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit roles', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete roles', ['only' => ['destroy']]);
    }
    public function index()
    {
        $roles = Role::withCount('permissions')->paginate(15);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255|unique:roles,name', 'permissions' => 'array']);
        $role = Role::create(['name' => $validated['name']]);
        if (!empty($validated['permissions'])) {
            $role->syncPermissions($validated['permissions']);
        }
        return redirect()->route('admin.roles.index')->with('status', 'Role created');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('admin.roles.edit', compact('role','permissions','rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => 'required|string|max:255|unique:roles,name,'.$role->id, 'permissions' => 'array']);
        $role->update(['name' => $validated['name']]);
        $role->syncPermissions($validated['permissions'] ?? []);
        return redirect()->route('admin.roles.index')->with('status', 'Role updated');
    }

    public function destroy(Role $role)
    {
        if ($role->name === 'Admin') {
            return back()->with('status', 'Cannot delete Admin role');
        }
        $role->delete();
        return back()->with('status', 'Role deleted');
    }
}


