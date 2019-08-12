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
        Role::create(['name' => 'Anwärter','sort_order' => 10]);
        Role::create(['name' => 'Wachtmeister','sort_order' => 20]);
        Role::create(['name' => 'Oberwachtmeister','sort_order' => 30]);


        Role::create(['name' => 'Hauptwachtmeister','sort_order' => 40]);

        Role::create(['name' => 'Kommisar','sort_order' => 50]);

        Role::create(['name' => 'Oberkommisar','sort_order' => 60]);

        Role::create(['name' => 'Hauptkommisar','sort_order' => 70]);
        $role = Role::create(['name' => 'Polizeidirektor','sort_order' => 80]);
        $role->givePermissionTo(Permission::all());


        Role::create(['name' => 'Trainer','sort_order' => 0]);
        Role::create(['name' => 'Ausbilder','sort_order' => 0]);
        Role::create(['name' => 'Ziv-Pol Leitung','sort_order' => 0]);

    }
}
