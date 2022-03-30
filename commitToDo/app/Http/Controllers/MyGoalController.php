<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use Illuminate\Http\Request;

class MyGoalController extends Controller
{
    //
    public function myGoal(){
        $md=new Goal();
        $inUser = session()->get('inUser');
        if($inUser==[] || $inUser=="" || $inUser==null){
            return redirect('signIn.php');
            exit;
        }
        $user_id = $inUser[0]->id;


        $data=$md->selectGoals($user_id);
        session(['goals'=>$data]);

        $goal=$data[0]->goal;
        $goal=htmlspecialchars($goal, ENT_QUOTES);
        session(['goal'=>$goal]);

        $reason1=$data[0]->reason1;
        $reason1=htmlspecialchars($reason1, ENT_QUOTES);
        session(['reason1'=>$reason1]);

        $reason2=$data[0]->reason2;
        $reason2=htmlspecialchars($reason2, ENT_QUOTES);
        session(['reason2'=>$reason2]);

        $reason3=$data[0]->reason3;
        $reason3=htmlspecialchars($reason3, ENT_QUOTES);
        session(['reason3'=>$reason3]);

        $image=$data[0]->want;
        $image=htmlspecialchars($image, ENT_QUOTES);
        session(['image'=>$image]);

        return view('pages.myGoal');
    }
    public function myGoalUpd(Request $request){
        $md=new Goal();

        $inUser = session()->get('inUser');
        $user_id = $inUser[0]->id;
        $goal = $request->input('goal');
        $reason1 = $request->input('reason1');
        $reason2 = $request->input('reason2');
        $reason3 = $request->input('reason3');
        $image = $request->input('image');

        //更新処理
        $md->updGoals($user_id,$goal,$reason1,$reason2,$reason3,$image);

        //更新後のデータ取得処理
        $data=$md->selectGoals($user_id);

        session(['goals'=>$data]);

        $goal=$data[0]->goal;
        $goal=htmlspecialchars($goal, ENT_QUOTES);
        session(['goal'=>$goal]);

        $reason1=$data[0]->reason1;
        $reason1=htmlspecialchars($reason1, ENT_QUOTES);
        session(['reason1'=>$reason1]);

        $reason2=$data[0]->reason2;
        $reason2=htmlspecialchars($reason2, ENT_QUOTES);
        session(['reason2'=>$reason2]);

        $reason3=$data[0]->reason3;
        $reason3=htmlspecialchars($reason3, ENT_QUOTES);
        session(['reason3'=>$reason3]);

        $image=$data[0]->want;
        $image=htmlspecialchars($image, ENT_QUOTES);
        session(['image'=>$image]);

        return view('pages.taskManagement');
    }
}
