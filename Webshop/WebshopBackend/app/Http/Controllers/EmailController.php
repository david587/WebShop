<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Models\newsLetter;

class EmailController extends Controller
{
    public function sendEmail()
{
    $emails = newsLetter::all();

    foreach ($emails as $email) {
        $data = ['message' => 'This is the message being sent'];
        Mail::to($email->email)->send(new SendMailable($data));
    }

    return 'Email was sent';
}

}
