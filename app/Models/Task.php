<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Spatie\GoogleCalendar\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'priority', 'status', 'due_date', 'user_id', 'google_event_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->hasMany(TaskHistory::class);
    }

    public function generateAccessToken($validMinutes = 60)
    {
        $this->access_token = Str::random(32);
        $this->access_expires_at = now()->addMinutes($validMinutes);
        $this->save();
    }

    public function revokeAccessToken()
    {
        $this->access_token = null;
        $this->access_expires_at = null;
        $this->save();
    }

    public function isAccessTokenValid()
    {
        return $this->access_token && $this->access_expires_at && Carbon::parse($this->access_expires_at)->isFuture();
    }

    public function storeHistory()
    {
        // Zapisz starą wersję w historii
        \App\Models\TaskHistory::create([
            'task_id' => $this->id,
            'user_id' => auth()->id(),
            'name' => $this->name,
            'description' => $this->description,
            'priority' => $this->priority,
            'status' => $this->status,
            'due_date' => $this->due_date,
            'changed_at' => now(),
        ]);
    }


    public function syncWithGoogleCalendar()
    {
        try{
            // Sprawdź, czy zadanie już istnieje w Google Calendar
            if ($this->google_event_id) {
                $event = Event::find($this->google_event_id);
                if ($event) {
                    $event->update([
                        'name' => $this->name,
                        'description' => $this->description,
                        'startDateTime' => Carbon::parse($this->due_date)->setTime(9, 0), // Start o 09:00
                        'endDateTime' => Carbon::parse($this->due_date)->setTime(10, 0), // Koniec o 10:00
                    ]);
                    return;
                }
            }

            // Tworzenie nowego eventu
            $event = new Event;
            $event->name = $this->name;
            $event->description = $this->description;
            $event->startDateTime = Carbon::parse($this->due_date)->setTime(9, 0);
            $event->endDateTime = Carbon::parse($this->due_date)->setTime(10, 0);
            $createdEvent = $event->save();

            // Zapisanie ID eventu w bazie
            $this->google_event_id = $createdEvent->id;
            $this->save();
        }catch(Exception $e){
            // dump($e->getMessage());
            Log::info($e->getMessage());
        }
    }

    public function removeFromGoogleCalendar()
    {
        if ($this->google_event_id) {
            $event = Event::find($this->google_event_id);
            if ($event) {
                $event->delete();
            }
            $this->google_event_id = null;
            $this->save();
        }
    }

}
