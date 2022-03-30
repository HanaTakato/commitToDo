<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskManagementController extends Controller
{
    //タスクテーブル内のデータ取得(GET)
    public function taskView(){
        // $md=new Task();
        $md=new Goal();
        $inUser = session()->get('inUser');

        if(!(session()->has('inUser'))){
            return redirect('signIn.php');
            exit;
        }

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

        if(!(session()->has('goal')) || !(session()->has('reason1')) || !(session()->has('image')) ){
            return redirect('signIn.php');
            exit;
        }
        if( $goal=='' || $reason1=='' || $image=='' ){
            return redirect('signIn.php');
            exit;
        }
        
        // dd($list);
        return view('pages.taskManagement');
    }
    
    //タスクテーブル内のデータ取得(GET)
    public function getTask(){
        // $md=new Task();
        
        $tasks = DB::select(
            "select * from tasks del_flg=0 and order by created_at asc"
        );
        
        // dd($list);
        return response()->json(['tasks' => $tasks]);
    }
    
    
    // //データ保存(POST)
    // public function postTask(Request $request) {
    //     $list = DB::insert(
    //         "insert into tasks (task) values"
    //     );
        
    // }
   
}
