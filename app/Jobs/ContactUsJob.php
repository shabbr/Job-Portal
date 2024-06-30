<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class ContactUsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

     protected $sendMail;
    /**
     * Create a new job instance.
     */
    public function __construct($sendMail)
    {
        $this->sendMail=$sendMail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email=new ContactUs();
        Mail::to($this->sendMail)->send($email);
    }
}
