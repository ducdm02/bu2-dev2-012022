<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from xuan truong',
            'body'  => 'This is my first mail',
        ];
        Mail::to("xuannt@ominext.com")->send(new TestMail($details));
        return "Email Sent";
    }
}
