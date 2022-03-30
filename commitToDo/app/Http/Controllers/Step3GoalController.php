<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Step3GoalController extends Controller
{
    //
    public function registerReason(Request $request){

        if(!(session()->has('inUser'))){
            return redirect('signIn.php');
            exit;
        }

        if(session()->has('reason1')){
            $reason = session('reason1');
            $reason=htmlspecialchars($reason,ENT_QUOTES);
            if($reason==null || $reason==''){
                    session(['reason_er'=>'理由１つは入れましょう。']);
                    return redirect('step2Goal.php');
                    exit;
            }
        }
        
        // $reason = $request['reason1'];
        // if($reason==null || $reason==''){
        //         session(['reason_er'=>'理由を１つは入れないと次には行かせれません。']);
        //         return redirect('step2Goal.php');
        //         exit;
        // }

        

        return view('pages.step3Goal');
    }
    public function get(){
        if(!(session()->has('inUser'))){
            return redirect('signIn.php');
            exit;
        }
        if(session()->has('goal')){
            return view('pages.step3Goal');
        }
        return redirect('signIn.php');
        exit;
    }
}
