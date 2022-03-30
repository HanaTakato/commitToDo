<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use Illuminate\Http\Request;

class FinGoalController extends Controller
{
    //
    public function registerImageUp(Request $request){
        $md=new Goal();
        if(!(session()->has('inUser'))){
            return redirect('signIn.php');
            exit;
        }

        $inUser=session()->get('inUser');
        // dd($inUser);
        $id=$inUser[0]->id;


        //目標、理由、イメージアップをDB登録
        $goal=session()->get('goal');
        $reason1=session()->get('reason1');
        $want=$request['want'];

        if($want=='' || $want==null){
            session(['want_er'=>'未入力はNGです。']);
            return redirect('step3Goal.php');
        }

        if(session()->has('reason2') && !(session()->has('reason3'))){
            $reason2=session()->get('reason2');
            $md->registerAllR2($id,$goal,$reason1,$reason2,$want);
        }elseif(session()->has('reason2') && session()->has('reason3')){
            $reason2=session()->get('reason2');
            $reason3=session()->get('reason3');
            $md->registerAllR3($id,$goal,$reason1,$reason2,$reason3,$want);
        }elseif(!(session()->has('reason2')) && !(session()->has('reason3'))){
            $md->registerAllR1($id,$goal,$reason1,$want);
        }
        
        
        return view('pages.finGoal');
    }

    public function get(){
        if(!(session()->has('inUser'))){
            return redirect('signIn.php');
            exit;
        }
        return redirect('signIn.php');
    }
}
