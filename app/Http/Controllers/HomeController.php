<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Transfer;
use DB;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    { 
        $user = Auth::user();

        $transfersin = Transfer::where('to', $user->account_number)->orderBy('created_at', 'desc')->get();
        $transfersout = Transfer::where('from', $user->account_number)->orderBy('created_at', 'desc')->get();

        $transferlist = Transfer::where('to', $user->account_number)
                    ->orWhere('from', $user->account_number)
                    ->orderBy('created_at', 'desc')
                    ->get();


        return view('home')->with(compact('user', 'transfersin', 'transfersout', 'transferlist'));
    }
}
