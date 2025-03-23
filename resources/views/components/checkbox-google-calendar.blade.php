@props(['task'])

<label class="mt-6 block">
    <input type="checkbox" {{ isset($task->google_event_id) ? 'checked' : '' }} checked name="add_to_google_calendar" value="1">
    {{ __('Add to Google Calendar') }}
</label>
