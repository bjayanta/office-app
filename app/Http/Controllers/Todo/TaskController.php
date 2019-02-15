<?php

namespace App\Http\Controllers\Todo;

use Auth;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $records = Todo::all();
        return response()->json($records, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:3',
            // 'note' => 'required',
        ]);

        $todo = new Todo();
        $todo->user_id = Auth::user()->id;
        $todo->title = $request->title;
        $todo->note = $request->note;
        $todo->save();

        return response()->json($request->all(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|min:3',
            // 'note' => 'required',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->title = $request->title;
        $todo->note = $request->note;
        $todo->save();

        return response()->json($request->all(), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Todo::where('id', $id)->delete();
        return response()->json(['success' => 'Information deleted successfully.']);
    }
}
