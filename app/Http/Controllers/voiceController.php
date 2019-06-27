<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Flight;
use DB;
use View;

class voiceController extends Controller
{
    public function hotel(){
    	    $h=request('q');
    	                                              //run query
   	    	$hotel = new Hotel();                      
	    	$hotel = DB::table('hotels')->select('id','HotelName', 'City','Country','Price')->where('City', '=', $h)->get();
	    	return View::make("frontEnd/showHotel", compact('hotel')); //take to show hotel view
    	
    }
    public function flight(){
    	    $f=request('f');
    	                                              //run query
   	    	$flight = new Flight();                      
	    	$flight = DB::table('flights')->select('id','AirlinesName', 'DepartureTime','ArrivalTime','Price')->where('AirlinesName', '=', $f)->get();
	    	
	    	return View::make("frontEnd/showFlight", compact('flight')); //take to show hotel view
    	
    }
  
}
