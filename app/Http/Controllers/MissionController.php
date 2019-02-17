<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $records = [];
        $where = [['user_id', '=', Auth::user()->id]];
        $data = Mission::where($where)->whereIn('status', ['pending', 'process', 'done', 'cancel'])->get();

        foreach($data as $row) {
            $records[] = [
                'date' => $row->created_at->diffForHumans(),
                'owner' => $row->owner->name,
                'user' => $row->user->name,
                'title' => $row->title,
                'description' => $row->note,
                'priority' => $row->priority,
                'status' => $row->status,
            ];
        }

        return response()->json($records, 200);
    }
}
