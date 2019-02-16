<?php

namespace App\Listeners;

use App\Models\Attendance;
use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TraceUserLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event) {
        // dd($event->user);

        $where = [
            ['user_id', '=', $event->user->id],
            ['ip_address', '=', \Request::ip()]
        ];

        $attendance = Attendance::where($where)->orderBy('id', 'DESC')->first();
        // dd($attendance);

        $where[] = ['id', '=', $attendance->id];
        // dd($where);

        $attendance = Attendance::where($where)->firstOrFail();
        $attendance->status = 'out';
        $attendance->save();
    }
}
