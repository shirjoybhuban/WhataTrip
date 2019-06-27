<?php

use Illuminate\Database\Seeder;
///use \App\Hotel;
class HotelListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\Hotel::class, 10)->create();
    }
}
