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
        $now = Carbon::now()->setTimezone('Asia/Kolkata');

        $this->info('Current Time: ' . $now);
    
        $events = Event::all();
    
        foreach ($events as $event) {
            $this->info('Event ID: ' . $event->id . ', Event End Time: ' . $event->event_end_time);
            if ($now->isAfter($event->event_end_time)) {
                $event->active = 0;
            } elseif ($now->isBetween($event->event_start_time, $event->event_end_time)) {
                $event->active = 1;
            } else {
                $event->active = 0;
            }
            $event->save();
            $this->info('Event ID: ' . $event->id . ', Active Status: ' . $event->active);
        }
    
        $this->info('Event statuses updated successfully.');
    }
    
}

