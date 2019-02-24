<?php

namespace App\Http\Controllers;

use App\Models\System\Meta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meta = Meta::all();
        return view('home', compact('meta'));
    }

    public function generateToken() {
        return view('generate-token');
    }
}
