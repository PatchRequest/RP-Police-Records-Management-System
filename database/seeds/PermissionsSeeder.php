<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);

        Permission::create(['name' => 'show ratings']);
        Permission::create(['name' => 'delete ratings']);

        Permission::create(['name' => 'manage news']);
        Permission::create(['name' => 'manage documents']);
        Permission::create(['name' => 'reset password']);

        Permission::create(['name' => 'create comments']);
        Permission::create(['name' => 'view comments']);

        Permission::create(['name' => 'edit ranks']);
    }
}
