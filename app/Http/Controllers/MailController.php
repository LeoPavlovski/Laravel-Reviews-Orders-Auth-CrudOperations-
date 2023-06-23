<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail($actorId)
    {
        $actor = Actor::findOrFail($actorId);
        $name = $actor->name;
        $nickname = $actor->nickname;
        $agent_id = $actor->agent_id;
        $date = $actor->date;

        $mail = new SignUp($name, $date, $agent_id, $nickname);

        Mail::to('test@gmail.com')->send($mail);

     return response()->json([
         'message'=>'email has been sent'
     ]);

    }

}
