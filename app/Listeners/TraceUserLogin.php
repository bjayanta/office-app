<?php

namespace App\Listeners;

use App\Models\Attendance;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TraceUserLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event) {
        // dd($event->user);

        $attendance = new Attendance();
        $attendance->user_id = $event->user->id;
        $attendance->ip_address = \Request::ip();
        $attendance->save();
    }
}
