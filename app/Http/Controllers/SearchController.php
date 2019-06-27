<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Flight;
use DB;
use View;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class SearchController extends Controller    // controller for search hotel and Flight
{
	public function __construct()
    {

 

    }

    public function index(Request $request){

    	

  		 $room=request('room');
  	    	if ($room!=null) {                         //separate form value for Hotel and Flight
    		    	// $request=new Request();
			    	$this->validate($request, [         //validation
			    	'hotelCity' => 'required',
			        'hotelCountry' => 'required'],
						['hotelCity.required' => 'The city field is required',
						'hotelCountry.required' => 'The country field is required'] );
						
	    	$hotelCity=request('hotelCity');            //fetch from form
		   	$hotelCountry=request('hotelCountry');
	    	// $hotelAadress=request('hotelAadress');
	    	$checkIn=request('checkIn');
	    	$checkOut=request('checkOut');
	    	$room=request('room');
                                                         //run query
   	    	$hotel = new Hotel();                      
	    	$hotel = DB::table('hotels')->select('id','HotelName', 'City','Country','Price')->where('Room', '>=', $room)->where('City', '=', $hotelCity)->where('Country', '=', $hotelCountry)->get();
	    	return View::make("frontEnd/showHotel", compact('hotel')); //take to show hotel view
	    	// dd($hotel);  		
    	}
    	
    	else{
	    	    	$this->validate($request, [              // Flight Validation
			    	'currentLoc' => 'required',
			        'destination' => 'required',
			        'depatureDate' => 'required',
			        'flightClass' => 'required',],
						['currentLoc.required' => ' From field is required',  //custom name for validation
						'destination.required' => ' To field is required'] );

	    	$currentLoc=request('currentLoc');             //fetch from form
	    	$destination=request('destination');
	    	$depatureDate=request('depatureDate');
	    	$flightClass=request('flightClass');
	    	// $adult=request('adult');
	    	// $children=request('children');
	    													 //run query
	    	$flight = new Flight();							
	    	$flight = DB::table('flights')->select('id','AirlinesName', 'DepartureTime','ArrivalTime','Price')->where('DepartureDate', '=', $depatureDate)->where('From', '=', $currentLoc)->where('To', '=', $destination)->where('FlightClass', '=', $flightClass)->get();
	    	// dd($flight); 
	    	return View::make("frontEnd/showFlight", compact('flight')); 	
	    	// return redirect('/flight');
	    	// return redirect()->route('flight', [$flight]);
	    	

    	}

    }
     public function autocomplete(Request $request){    //run query to search input field

     	$data = Hotel::select("Country as name")->where("Country","LIKE","%{$request->input('query')}%")->get();
     	return response()->json($data);
     	// $data = Hotel::select("Country as name")->where("Country","LIKE","%{$request->input('query')}%")->get();
      //   return response()->json($data);

     }
}
