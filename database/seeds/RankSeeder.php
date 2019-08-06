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
        DB::table('ranks')->insert([
            'name' => 'Anwärter'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Wachtmeister'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Oberwachtmeister'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Hauptwachtmeister'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Kommisar'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Oberkommisar'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Hauptkommisar'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Polizeidirektor'
        ]);
    }
}
