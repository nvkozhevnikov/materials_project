<?php

namespace App\Http\Controllers;

use App\Jobs\AddNewSubscriberToBaseJob;
use App\Jobs\SendMailToUsJob;
use App\Sendinblue\Configuration;
use App\Sendinblue\Api\ContactsApi;
use Illuminate\Http\Request;
use App\Mail\ContactsMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:254',
            'subject' => 'required|string|max:300',
            'message' => 'required|string|max:1000',

        ]);

        $from_name = $request->input('name');
        $from_email = $request->input('email');
        $subject = $request->input('subject');
        $from_message = $request->input('message');

        $this->dispatch(new SendMailToUsJob($from_name, $from_email, $subject, $from_message));

        return back()->with('successful_sent', 'Сообщение отправлено успешно.');

    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:129',
        ]);

        $new_subscriber = $request->input('email');

        $this->dispatch(new AddNewSubscriberToBaseJob($new_subscriber));

        return back()->with('successful_subscribe',
            "Подтвердите подписку, кликнув на кнопку, в письме, которое мы отправили на {$new_subscriber}.");
    }
}
