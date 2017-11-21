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
        User::create([
            'name' => 'Boss',
            'nickname'=>'',
            'email' => 'kimhoureng001@gmail.com',
            'gender'=> 1,
            'password' => 'kimhour',
            'image'=> 'hour.jpg'
        ]);

        User::create([
            'name' => 'Minea',
            'nickname'=>'',
            'email' => 'sominea.ny77@gmail.com',
            'gender'=> 1,
            'password' => 'minea',
            'image'=> 'minea.jpg'
        ]);

        User::create([
            'name'=>"Eang",
            'nickname'=>'',
            'email'=>'eang@gmail.com',
            'gender'=> 1,
            'password'=> 'eang',
            'image'=> 'eang.jpg'
        ]);


    }
}
