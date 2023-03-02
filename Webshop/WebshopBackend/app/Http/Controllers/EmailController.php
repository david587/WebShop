<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Models\newsLetter;
use App\Http\Resources\newsLetter as NewsLetterResources;

class EmailController extends BaseController
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

    public function Emails()
    {
        $emails = newsLetter::all();
        return $this->sendResponse(NewsLetterResources::collection($emails), "");
    }

}   
