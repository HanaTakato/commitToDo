<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Step1GoalController extends Controller
{
    //サインインしているユーザーがGoal設定終わっているかの確認
    public function checkUser()
    {

        $md = new User();
        if(!(session()->has('inUser'))){
            return redirect('signIn.php');
            exit;
        }

        $inUser = session()->get('inUser');
        if($inUser==[] || $inUser=="" || $inUser==null){
            return redirect('signIn.php');
            exit;
        }


        $id = $inUser[0]->id;
        $role = $inUser[0]->role;
        //管理者でのサインインなら管理者ページへ
        if ($id == 0 && $role == 1) {
            return redirect('admin.php');
            exit;
        }

        $checkGoal = $md->checkGoal($id);

        //Goal設定が終わっているか終わっていないかで遷移先判断
        if ($checkGoal == []) { //Goal設定が終わっていないパターン
            return view('pages.step1Goal');
        } elseif (!($checkGoal == [])) {

            $goal = $checkGoal[0]->goal;
            $reason1 = $checkGoal[0]->reason1;
            $want = $checkGoal[0]->want;
        }

        if (!($goal == "") && !($goal == null) && !($reason1 == null) && !($reason1 == "") && !($want == null) && !($want == "")) {
            //登録が終わっているなら
            return redirect('/taskManagement.php');
            exit;
        } elseif ($goal == "" || $goal == null || $reason1 == null || $reason1 == "" || $want == null || $want == "") {
            return view('pages.step1Goal');
        }
    }

    


}
