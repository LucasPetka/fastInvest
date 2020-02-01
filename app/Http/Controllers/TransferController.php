<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transfer;
use Auth;

class TransferController extends Controller
{

    public function makeTransfer(Request $request)
    {
        $user = Auth::user();

        $transfer = new Transfer;
        $transfer->from = $user->account_number;
        $transfer->to = $request->input('account_number');
        $transfer->amount = $request->input('amount');
        $transfer->purpose = $request->input('purpose');

        $user->balance = $user->balance - $request->input('amount');
        $second_user =  User::where('account_number', $request->input('account_number'))->first();
        $second_user->balance = $second_user->balance + $request->input('amount');


        if($user->account_number == $request->input('account_number'))
            return redirect('/home')->with('error', 'You cannot make transaction to yourself');

        

        if($user->balance > 0){
            if($transfer->save())
            {   
                $user->save();
                $second_user->save();

                return redirect('/home')->with('success', 'Money has been sent');
            }
            else
            {
                return redirect('/home')->with('error', 'Error! money did not go through');
            }
        }
        else
        {
            return redirect('/home')->with('error', 'Account cannot go negative');
        }
        
    }

    
}
