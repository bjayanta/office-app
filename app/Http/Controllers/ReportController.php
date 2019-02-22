<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function create(Request $request) {
        $report = new Report();
        $report->user_id = Auth::user()->id;
        $report->comment = $request->comment;
        $report->report_at = new Carbon($request->year . '-' . $request->month . '-' . $request->day);
        $report->save();

        return response()->json($report, 200);
    }

}
