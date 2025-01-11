<?php

namespace App\Jobs\V1;

use App\Models\WorkingHour;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class WorkHourJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
       public array $week_days
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         foreach ($this->week_days as  $day) {
            WorkingHour::create($day);
        }
    }
}
