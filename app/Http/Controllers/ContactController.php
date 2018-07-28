<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
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

        Mail::send('emails.contact', $data, function($message) use($data){
            $message->from($data['email']);
            $message->to('marclouie06@gmail.com');
            $message->subject($data['subject']);
        });

        return response()->json('success');
        
    }
}
