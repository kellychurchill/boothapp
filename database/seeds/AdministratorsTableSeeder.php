<?php

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            'username' => 'admin',
            'password' => Hash::make('ohsuadmin'),
            'name' => 'Patty Crowe'
        ]);
    }
}
