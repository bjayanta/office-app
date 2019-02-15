<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller {

    public function index() {
        $records = Attendance::where('user_id', Auth::user()->id)->get();
        return response()->json($records, 200);
    }
}
