<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use Illuminate\Http\Request;

class Step2GoalController extends Controller
{
    //POST
    public function registerGoal(Request $request){
        if(!(session()->has('inUser'))){
            return redirect('signIn.php');
            exit;
        }

        $goal=$request['goal'];

        if($goal==null || $goal==''){
            session(['goal_er'=>'未入力はNGです。']);
            return redirect('step1Goal.php');
            exit;
        }

        $goal=htmlspecialchars($goal, ENT_QUOTES);
        session(['goal'=>$goal]);



        return view('pages.step2Goal');
    }
    public function get(){
        if(!(session()->has('inUser'))){
            return redirect('signIn.php');
            exit;
        }
        if(session()->has('goal')){
            return view('pages.step2Goal');
        }
        return redirect('signIn.php');
        exit;

    }
}
