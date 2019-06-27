<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Hotel::class, function (Faker\Generator $faker) {
    

    return [
       			'HotelName' => $faker->word,
                'HotelAddress' => $faker->streetAddress,
                'City' => $faker->city ,
                'Country' => $faker->country ,
                'Room' => $faker->numberBetween(0,50),
                'Price' => $faker->numberBetween(20,100), 
           ];
});

$factory->define(App\Flight::class, function (Faker\Generator $faker) {
    

    return [ 
    			
       			'AirlinesName' => $faker->word,
                'DepartureTime' => $faker->time($format = 'H:i:s', $max = 'now'),
                'ArrivalTime' => $faker->time($format = 'H:i:s', $max = 'now') ,
                'Price' => $faker->numberBetween(20,100),
                'DepartureDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'From' => $faker->country, 
                'To' => $faker->country ,
                'FlightClass' => $faker->word,
           ];
});
