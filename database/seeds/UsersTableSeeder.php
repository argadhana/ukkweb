<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([
            'name' => 'Arga dhana',
            'username' => 'argadhana',
            'password' => bcrypt('Bismillah'),
            'email' => 'admin@admin.com',
        ]);
    }
}
