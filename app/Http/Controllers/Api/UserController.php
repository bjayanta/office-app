<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    /**
     * header options
     * Authorization: Bearer <Token>
     * Accept: application/json
     *
     */
    public function credential() {
        $user = Auth::user();
        return response()->json(['success' => $user], 200);
    }
}
