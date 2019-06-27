<?php

namespace App\Http\Controllers;
use View;

use Illuminate\Http\Request;

class HotelBookController extends Controller
{
     public function __construct()
    {
    	//dd('BHUBAN');
    }
     public function index($id){
     	//dd($id);
     	return View::make('frontEnd.bookHotel')->with('id', $id);       //This controller return the booked hotel id in the view

     }
}
