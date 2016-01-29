<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        [
            'name'      => 'lolo',
            'email'     =>'lolo@lolo.fr',
            'password'  => Hash::make('lolo'),
            'role'      => 'administrator'
        ],
        [
            'name'      => 'tony',
            'email'     =>'tony@tony.fr',
            'password'  => Hash::make('tony'),
            'role'      => 'visitor'
        ],
        [
            'name'      => 'romain',
            'email'     =>'romain@romain.fr',
            'password'  => Hash::make('romain'),
            'role'      => 'visitor'
        ],
        [
            'name'      => 'yini',
            'email'     =>'yini@yini.fr',
            'password'  => Hash::make('yini'),
            'role'      => 'visitor'
        ]
        ]);
    }
}
