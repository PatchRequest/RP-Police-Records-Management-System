<?php

use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'guard_name' => 'web',
            'name' => 'Anwärter'
        ]);
        DB::table('roles')->insert([
            'guard_name' => 'web',
            'name' => 'Wachtmeister'
        ]);
        DB::table('roles')->insert([
            'guard_name' => 'web',
            'name' => 'Oberwachtmeister'
        ]);
        DB::table('roles')->insert([
            'guard_name' => 'web',
            'name' => 'Hauptwachtmeister'
        ]);
        DB::table('roles')->insert([
            'guard_name' => 'web',
            'name' => 'Kommisar'
        ]);
        DB::table('roles')->insert([
            'guard_name' => 'web',
            'name' => 'Oberkommisar'
        ]);
        DB::table('roles')->insert([
            'guard_name' => 'web',
            'name' => 'Hauptkommisar'
        ]);
        DB::table('roles')->insert([
            'guard_name' => 'web',
            'name' => 'Polizeidirektor'
        ]);
    }
}
