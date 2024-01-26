<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    //
    public function checkUserExistence(Request $request, $userId)
    {
        $user = User::find($userId);

        if ($user) {
            return response()->json(['exists' => true, 'user' => $user]);
        } else {
            return response()->json(['exists' => false, 'message' => 'User not found'], 404);
        }
    }
}
