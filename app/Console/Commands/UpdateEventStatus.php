<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class UpdateEventStatus extends Command
{
    protected $signature = 'events:update-status';
    protected $description = 'Update the status of events based on their start and end dates';

    public function handle()
    {
        $now = Carbon::now();
        $events = Event::all();

        foreach ($events as $event) {
            if ($now->isAfter($event->event_end_time)) {
                $event->active = 0; // Inactive if ended
            } elseif ($now->isBetween($event->event_start_time, $event->event_end_time)) {
                $event->active = 1; // Active if ongoing
            } else {
                $event->active = 0; // Inactive if hasn't started
            }
            $event->save();
        }

        $this->info('Event statuses updated successfully.');
    }
}

