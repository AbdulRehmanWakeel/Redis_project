<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userEmail;
    public $userName;

    public function __construct($userEmail, $userName)
    {
        $this->userEmail = $userEmail;
        $this->userName = $userName;
    }

    public function handle(): void
    {
        Mail::to($this->userEmail)
            ->send(new WelcomeEmail($this->userName));
            
        \Log::info("Welcome email sent to: {$this->userEmail}");
    }

    public function failed(\Throwable $exception): void
    {
        \Log::error("Failed to send email to: {$this->userEmail}", [
            'error' => $exception->getMessage()
        ]);
    }
}