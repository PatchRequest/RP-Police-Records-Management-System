<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Admin',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'creator_id' => 1,
            'UID' => 0,
            'forum_id' => 0,
            'role_id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }





}
