<?php

namespace App\Http\Controllers;

use Auth;
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
        $where = [
            ['user_id', '=', Auth::user()->id],
        ];

        $records = Mission::where($where)->whereIn('status', ['pending', 'process'])->get();

        return response()->json($records, 200);
    }
}
