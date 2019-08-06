<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsController extends Controller
{
    public function index(){
        $allRoles = Role::all();

        $allPermissions = Permission::all();


        return view('Permissions.index',[
            'allRoles' => $allRoles,
            'allPermissions' => $allPermissions
        ]);
    }
}
