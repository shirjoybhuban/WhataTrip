<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;                     //For using Paypal
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;


use App\Mail\PayConfirm;   //add mail config

use App\HotelBook;
use App\Hotel;
use DB;


class HotelBookControllerV2 extends Controller
{
     private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()             //Load config of paypal IN CONSTURCTOR
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
     public function index($id,Request $request){            //Book and Paypal function take hotel id as parrameter

      $this->validate($request, [         //validation
            'email' => 'unique:hotel_books,Email']);
     	
      $hotelbook = new HotelBook();                           //retrive data from Form
      $hotelbook->FirstName=request('firstname');
      $hotelbook->LastName=request('lastname');
      $hotelbook->Email=request('email');
      $hotelbook->CheckIn=request('CheckInDate');
      $hotelbook->CheckOut=request('CheckOutDate');
      $hotelbook->RoomRequired=request('room');
      $hotelbook->HotelId=$id;
      $hotelbook->save();

      $hotel = new Hotel();                                     //run query where where search the hote which match with the hotel id 
      $hotel = DB::table('hotels')->select('Room')->where('id', '=', $id)->get();
      $updateRoom=$hotel[0]->Room-request('room');   //minus the required room number from the current room in database

      $hotel1 = Hotel::find($id);
	   if($hotel1) {
	    $hotel1->Room = $updateRoom;
	    $hotel1->save();}  
                                            //change the room number in hotel id after book
      $HotelPrice=$hotel1->Price;
      $HotelName=$hotel1->HotelName;


      $emailt =request('email');                                      
      \Mail::to($emailt)->send(new PayConfirm); // send mail after book


// From paypal api start


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName($HotelName)               //set item name hotel name
            ->setCurrency('USD')
            ->setQuantity(1)
            // ->setPrice($request->get('amount')); /** unit price **/
                ->setPrice($HotelPrice);            //SET THE HOTEL PRICE

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            // ->setTotal($request->get('amount'));
                ->setTotal($HotelPrice);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');

    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            \Session::put('error', 'Payment failed');
            return Redirect::to('/');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            \Session::put('success', 'Payment success');
            return Redirect::to('/');

        }

        \Session::put('error', 'Payment failed');
        return Redirect::to('/');
      
     }
}
