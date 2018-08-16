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
            'emailadd'      => $request->emailadd,
            'subject'       => $request->subject,
            'bodyMessage'   => $request->message
        );
    
        Mail::send('emails.contact', $data, function($message) use($data){
            $message->from('pierre&paul@gmail.com', $data['name']);
            $message->to('ppsi.main@gmail.com');
            $message->subject($data['subject']);
        });

        return response()->json('success');
        
    }
}
