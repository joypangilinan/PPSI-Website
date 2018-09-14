<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use App\Mail\SendMail;
use Session;

class ContactController extends Controller
{
    public function postContact(Request $request) {
      
        $data = array(
            'name'          => $request->name,
            'email'         => $request->email,
            'subject'       => $request->subject,
            'bodyMessage'   => $request->message
        );
        
        Mail::to("ppsi.main@gmail.com")
            ->send(new SendMail($data));
        // Mail::send('emails.contact', $data, function($message) use ($data){
        //     $message->from($data['emailadd']);
        //     $message->to('ppsi.main@gmail.com');
        //     $message->subject($data['subject']);
        // }); 
        
        return response()->json('success');
        
    }
}
