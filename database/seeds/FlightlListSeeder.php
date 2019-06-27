<?php

use Illuminate\Database\Seeder;
use \App\Flight;
use Carbon\Carbon;

class FlightlListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $flight=new Flight();
     //    $flight->AirlinesName="Airget";
     //    $flight->DepartureTime="01:00:00";
     //    $flight->ArrivalTime="02:45:00";
     //    $flight->Price="7500";
       
     //    // $flight->DepartureDate= Carbon::parse('2018-04-01');
     //    $flight->DepartureDate= "2018-04-01";
        
     //     $flight->From="Dhaka";
     //    $flight->To="USA";
     //    $flight->FlightClass="Economy";
        
     //    $flight->save();

        $users = factory(App\Flight::class, 10)->create();
        
    }
}
