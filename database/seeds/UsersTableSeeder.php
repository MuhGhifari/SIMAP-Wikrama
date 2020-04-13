<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Muhammad Ghifari', 'Salman Faris'];
        $username = ['MuhGhifari', 'KingSalman'];
        $email = ['muhammadghifari37@gmail.com', 'asdfasdf@asdf.com'];
        $password = [bcrypt('asdfasdf'), bcrypt('asdfjkl;')];
        $avatar = ['user.png', 'user.png'];
        $role = ['admin', 'superadmin'];
        for ($i=0; $i < count($name); $i++) { 
        	User::create([
        	'name' => $name[$i],
        	'username' => $username[$i],
        	'email' => $email[$i],
        	'password' => $password[$i],
        	'role' => $role[$i],
            'avatar' => $avatar[$i],
        	]);
        }
    }
}
