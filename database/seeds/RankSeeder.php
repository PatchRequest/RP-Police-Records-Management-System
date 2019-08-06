<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Anwärter']);
        Role::create(['name' => 'Wachtmeister']);
        Role::create(['name' => 'Oberwachtmeister']);
        Role::create(['name' => 'Hauptwachtmeister']);
        Role::create(['name' => 'Kommisar']);
        Role::create(['name' => 'Oberkommisar']);
        Role::create(['name' => 'Hauptkommisar']);
        $role = Role::create(['name' => 'Polizeidirektor']);
        $role->givePermissionTo(Permission::all());

    }
}
