<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //logic is going to be here
    public function sendMail()
    {
        $user_name="Leo";
        $user_surname="Pavlovski";
        $book = Book::where('title','Harry Potter')->first();
        $author= Author::where('name',"JK Rolwings")->first();

        Mail::to("leo.te2011@hotmail.com")->send(new SignUp($user_name, $user_surname, $book, $author));
    }
}
