<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
    
        User::create(array(
            'name'     => 'Hang',
            'email'    => 'hang2@realworld.jp',
            'password' => Hash::make('mypass'),
        ));
    }
}