<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NexmoSMSController extends Controller
{
  public function index()
 {
     try {

         $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
         $client = new \Nexmo\Client($basic);

         $receiverNumber = "255717062298";
         $message = "C1903";

         $message = $client->message()->send([
             'to' => $receiverNumber,
             'from' => '0764706227',
             'text' => $message
         ]);

         dd('SMS Sent Successfully.');

     } catch (Exception $e) {
         dd("Error: ". $e->getMessage());
     }
 }
}
