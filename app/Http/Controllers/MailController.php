<?php

namespace App\Http\Controllers;

use App\Mail\Signup;
use App\Models\Author;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail($orderId){
        $name = "leo";
        $surname = "pavlovski";
        $book = Book::where('title', 'Harry Potter')->first();
        $order = Order::where('order_id', $orderId)->first();
        $author = Author::where('name',"JK Rolwings")->first();
//
        Mail::to("leo.te2011@hotmail.com")->send(new Signup($surname , $name, $book ,$order, $author));
        return view('welcome');
    }
}
