<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view users', ['only' => ['index', 'data']]);
        $this->middleware('permission:create users', ['only' => ['store']]);
        $this->middleware('permission:edit users', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete users', ['only' => ['destroy']]);
    }
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.index', compact('roles','permissions'));
    }

    public function data(Request $request)
    {
        $query = User::query()->whereDoesntHave('roles', function($q){ $q->where('name', 'Admin'); });
        return DataTables::of($query)
            ->addColumn('roles', function(User $user){ return $user->getRoleNames()->join(', '); })
            ->addColumn('permissions', function(User $user){ return $user->getPermissionNames()->join(', '); })
            ->addColumn('action', function(User $user){
                return '<a href="'.route('admin.users.edit', $user).'" class="text-theme">Edit</a>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $userRoleNames = $user->getRoleNames()->toArray();
        $userPermissionNames = $user->getPermissionNames()->toArray();
        return view('admin.users.edit', compact('user','roles','permissions','userRoleNames','userPermissionNames'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'roles' => 'array',
            'permissions' => 'array',
        ]);
        $user->syncRoles($validated['roles'] ?? []);
        $user->syncPermissions($validated['permissions'] ?? []);
        return redirect()->route('admin.users.index')->with('status', 'User updated');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'roles' => 'array',
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        if (!empty($validated['roles'])) {
            $user->syncRoles($validated['roles']);
        }
        return back()->with('status', 'User created');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('Admin')) {
            return back()->with('status', 'Cannot delete Admin user');
        }
        $user->delete();
        return back()->with('status', 'User deleted');
    }
}


