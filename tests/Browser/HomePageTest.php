<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Links_and_Views extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    // public function test1()
    // {
    //     $this->browse(function ($browser) {
    //         $browser->visit('/')
    //                 ->pause(1000)
    //                 ->visit('/maverick')
    //                 ->pause(1000)
    //                 ->visit('/flightContent')
    //                 ->pause(1000)
    //                 ->visit('/hotelContent')
    //                 ->pause(1000)
    //                 ->visit('/cab')
    //                 //->clicklink(Maverick)
    //                 //->clicklink(Flights)
    //                 //->clicklink(Maverick)
    //                 ->pause(1000);
    //     });
    // }

    public function test2()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                    ->clicklink('Connect Your Voice')
                    ->pause(1000)
                    
                    ->visit('/')
                    ->clicklink('Maverick')
                    ->pause(1000)

                    ->visit('/')
                    ->clicklink('Hotel')
                    ->pause(1000)
                    
                    ->visit('/')
                    ->clicklink('Flights')
                    ->pause(1000)
                    
                    ->visit('/')
                    ->clicklink('Car')
                    ->pause(1000)
                    
                    ->visit('/')
                    ->clicklink('Google Login')
                    ->pause(1000);
        });
    }
    
    // public function test3()
    // {
    //     $this->browse(function ($browser) {
    //         $browser->visit('/whatatrip')
    //                  ->type('from', 'taylor@laravel.com')
    //                 //->type('From:','Dhaka')
    //                 ->pause(5000);
    //     });
    // }

    // public function test4()
    // {
    //     $this->browse(function ($browser) 
    //     {           
    //         $browser->visit('/register')              
    //        ->assertSee('Register')               
    //        ->type('name', 'Webber Wang')         
    //        ->type('email', 'email@gmail.com') 
    //        ->type('password', 'password')        
    //        ->press('Register')

    //         ->assertDatabaseHas('users', 
    //         [ 'email' => 'email@gmail.com']);              
    //      });   
    // }

}
