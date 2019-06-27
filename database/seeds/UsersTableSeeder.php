<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name="Bhuban";
        $user->email="Btg";
        $user->password="Bhuban";
        $user->save();
    }
}
