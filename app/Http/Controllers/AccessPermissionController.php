<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class AccessPermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $menus = Menu::with('permissions')->get();

        return view(
            'pages.admin.access-control.index',
            compact('roles', 'menus')
        );
    }

    public function saveRole(CreateRoleRequest $request)
    {
        $request->validated();
        
        Role::create(['name' => $request->role]);

        return response()->json([
            'success' => true,
            'message' => 'Role Created Successfully'
        ], 201);
    }

    public function savePermissions(Request $request)
    {
        $menuPermissions = $request->menuPermissions;
        $roleName = $request->role;

        $role = Role::where('name', $roleName)->first();

        if (!$role) {
            return redirect()->back()->with('error', 'Role not found');
        }

        $role->syncPermissions([]);
        collect($menuPermissions)->each(function ($permissionName) use ($role) {
            $permission = Permission::firstOrCreate(['name' => Str::lower($permissionName)]);
            $role->givePermissionTo($permission);
            $permission->assignRole($role);
        });

        return redirect()->route('admin.access-controls')->with('success', 'Permissions Assigned Successfully');
    }
}
