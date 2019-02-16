<?php

namespace App\Http\Controllers\Admin;

use App\Models\User\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller {

    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index(Request $request) {
        $agents = User::all();
        $records = Attendance::paginate(15);

        if($request->search != null) {
            $records = Attendance::where('user_id', $request->search)->paginate(15);
            $records->appends($request->only('search'));
        }

        return view('admin.attendance.index', compact('agents', 'records'));
    }
}
