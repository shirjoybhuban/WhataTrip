<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class FlightBookController extends Controller
{
    public function index($id){
     	
     	return View::make('frontEnd.bookFlight')->with('id', $id);       //This controller return the booked hotel id in the view

     }
}
