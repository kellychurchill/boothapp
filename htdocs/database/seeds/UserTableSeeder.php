<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();

        $users = array(
            ['id' => 887, 'name' => 'User One', 'email' => 'test1@gmail.com', 'password' => Hash::make('test'), 'program_level' => 'Brownie'],
            ['id' => 2113, 'name' => '', 'email' => '', 'password' => '', 'program_level' => 'Ambassador'],
            ['id' => 2047, 'name' => 'User Three', 'email' => 'test3@gmail.com', 'password' => Hash::make('test'), 'program_level' => ''],
            ['id' => 237, 'name' => 'User Four', 'email' => 'test4@gmail.com', 'password' => Hash::make('test'), 'program_level' => ''],
        );
            
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}
