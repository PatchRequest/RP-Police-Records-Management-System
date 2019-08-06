<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('permissions')->insert([
            'guard_name' => 'web',
            'name' => 'edit_rights',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);


        

    }
}
