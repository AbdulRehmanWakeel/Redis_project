<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function handle()
    {
        Log::info("Processing payment of {$this->amount}");
        
        sleep(3);
        
        Log::info("Payment processed successfully!");
    }
}