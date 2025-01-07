<?php

namespace App\Http\Controllers;
use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use Mail;
use pdf;
class PdfController extends Controller
{
    //
    public function sendMail()
   {
       $details['to'] = 'buruwawa@gmail.com';
       $details['name'] = 'Receiver Name';
       $details['subject'] = 'TEsting Email';
       $details['message'] = 'Here goes all message body.';

       SendMailJob::dispatch($details)
         ->delay(now()->addMinutes(5));
       return response('Email sent successfully');
   }
}
