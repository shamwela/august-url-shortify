<?php

namespace App\Jobs;

use App\Url\Url;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ExportJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Url $url) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger("Your url is {$this->url->original_url}");
        logger('We will export your URL data in 5 minutes. Blah Blah Blah.');
    }
}
