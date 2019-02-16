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
            $data[$key]->id = $row->id;
            $data[$key]->user = $row->user_id;
            $data[$key]->ip = $row->ip_address;
            $data[$key]->date = Carbon::parse($row->created_at)->format('j M, y');
            $data[$key]->in = Carbon::parse($row->created_at)->format('h:i');
            $data[$key]->out = Carbon::parse($row->updated_at)->format('h:i');
            $data[$key]->le = $row->late_entry;
            $data[$key]->el = $row->early_leave;
            $data[$key]->status = ucwords($row->status);
        }

        return response()->json($data, 200);
    }
}
