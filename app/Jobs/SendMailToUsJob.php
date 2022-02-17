<?php

namespace App\Jobs;

use App\Mail\ContactsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailToUsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $from_name;
    protected $from_email;
    protected $subject;
    protected $from_message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($from_name, $from_email, $subject, $from_message)
    {
        $this->from_name = $from_name;
        $this->from_email = $from_email;
        $this->subject = $subject;
        $this->from_message = $from_message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $objMail = new \stdClass();
        $objMail->from_name = $this->from_name;
        $objMail->from_email = $this->from_email;
        $objMail->subject = $this->subject;
        $objMail->from_message = $this->from_message;

        Mail::to(config('app.email_admin_for_notification'))->send(new ContactsMail($objMail));
    }
}
