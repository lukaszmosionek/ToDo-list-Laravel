<?php

namespace App\Console\Commands;

use App\Mail\TaskReminderMail;
use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SendTaskReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-task-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wysyła przypomnienia e-mail o zadaniach na dzień przed terminem';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->toDateString();

        $tasks = Task::where('due_date', $tomorrow)->with('user')->get();

        foreach ($tasks as $task) {
            Mail::to($task->user->email)->queue(new TaskReminderMail($task));
        }

        $this->info('Powiadomienia o zadaniach wysłane! IDs zadań:'. ($tasks->pluck('id')));
    }
}
