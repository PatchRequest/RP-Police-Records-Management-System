<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function addRole(){
        $user = User::find(request('user'));
        $role = Role::find(request('role'));

        $user->assignRole($role->name);
        return back();
    }

    public function removeRole(){
        $user = User::find(request('user'));
        $role = Role::find(request('role'));

        $user->removeRole($role->name);
        return back();
    }
}
