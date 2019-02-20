<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Mission;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MissionController extends Controller {

    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $agents = User::all();
        $missions = Mission::whereIn('status', ['pending', 'process'])->paginate(5);

        if($request->agent != null) {
            $where = [
                ['user_id', '=', $request->agent],
                ['status', '=', $request->status],
            ];

            $missions = Mission::where($where)->paginate(5);
            $missions->appends($request->only('agent', 'status'));
        }

        return view('admin.mission.index', compact('agents', 'missions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $agents = User::all();
        return view('admin.mission.create', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $mission = new Mission();
        $mission->admin_id = Auth::user()->id;
        $mission->user_id = $request->agent;
        $mission->title  = $request->title;
        $mission->note = $request->note;
        $mission->priority = $request->priority;
        $mission->save();

        $request->session()->flash('success', "Mission set successfully!");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $record = Mission::find($id);
        return view('admin.mission.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $agents = User::all();
        $record = Mission::find($id);

        return view('admin.mission.edit', compact('agents', 'record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $mission = Mission::findOrFail($id);
        $mission->user_id = $request->agent;
        $mission->title  = $request->title;
        $mission->note = $request->note;
        $mission->priority = $request->priority;
        $mission->save();

        $request->session()->flash('success', "Mission information changed successfully!");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Mission::where('id', $id)->delete();
        return redirect()->back();
    }
}
