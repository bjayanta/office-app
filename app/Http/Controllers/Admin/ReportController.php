<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use App\Models\Mission;
use App\Models\User\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller {

    public function index(Request $request) {
        $reports = [];

        $agents = User::all();

        $where = [
            ['created_at', '>=', date('Y-m-d') . '00:00:00'],
        ];

        $reports = Report::where($where)->paginate(15);

        if($request->agent != null) {
            $only = ['agent'];

            $where = [
                ['user_id', '=', $request->agent],
            ];

            if($request->from !== null) {
                $only[] = 'from';
                $where[] = ['created_at', '>=', $request->from . ' 00:00:00'];
            }

            if($request->to !== null) {
                $only[] = 'to';
                $where[] = ['created_at', '>=', $request->to . ' 00:00:00'];
            }

            $reports = Report::where($where)->paginate(15);
            $reports->appends($request->only($only));
        }

        return view('admin.report.search', compact('agents', 'reports'));
    }

    public function show($id) {
        // get report
        $report = Report::find($id);

        // get attendance
        $where = [
            ['user_id', '=', $report->user_id],
            ['created_at', '>=', $report->report_at . ' 00:00:00'],
            ['updated_at', '<=', $report->report_at . ' 24:00:00'],
        ];

        $attendances = Attendance::where($where)->get();

        // get mission
        $missions = Mission::where($where)->get();

        return view('admin.report.daily', compact('report', 'attendances', 'missions'));
    }

}
