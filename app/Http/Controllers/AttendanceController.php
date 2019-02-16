<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $data = Attendance::where('user_id', Auth::user()->id)->paginate(10);

        foreach($data as $key => $row) {
            // late entry
            $leTo = Carbon::parse(date('Y-m-d') . ' 14:00:00');
            $leFrom = Carbon::parse($row->created_at);

            // early leave
            $elTo = Carbon::parse($row->updated_at);
            $elFrom = Carbon::parse(date('Y-m-d') . ' 15:00:00');

            $data[$key]->id = $row->id;
            $data[$key]->user = $row->user_id;
            $data[$key]->ip = $row->ip_address;
            $data[$key]->date = Carbon::parse($row->created_at)->format('j M, y');
            $data[$key]->in = Carbon::parse($row->created_at)->format('h:i');
            $data[$key]->out = Carbon::parse($row->updated_at)->format('h:i');
            $data[$key]->le = $leTo->diffInMinutes($leFrom);
            $data[$key]->el = $elTo->diffInMinutes($elFrom);
            $data[$key]->status = ucwords($row->status);
        }

        return response()->json($data, 200);
    }
}
