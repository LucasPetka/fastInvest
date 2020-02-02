<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AJAXController extends Controller
{

    //--------------Check if user with this account number exists and return response for the user----------
    public function index(Request $request) {
        
        $account_number = $request->input('accnumber');

        $exists = User::where('account_number', $account_number)->exists();

        $user = User::where('account_number', $account_number)->first();

        if (!empty($exists)) {
            return response()->json(array('found'=> true, 'user_name'=> $user->name), 200);
        }
        else{
            return response()->json(array('found'=> false), 200);
        }

     }
}
