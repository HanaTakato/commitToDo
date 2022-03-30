<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserNameUpdateController extends Controller
{
    //getでページに入ってきた時の処理
    public function userNameUpdate(){
        $md=new User();
        $inUser = session()->get('inUser');

        if($inUser==[] || $inUser=="" || $inUser==null){
            return redirect('signIn.php');
            exit;
        }

        $user_id = $inUser[0]->id;

        $user=$md->searchUserId($user_id);
        $name=$user[0]->name;
        $name=htmlspecialchars($name, ENT_QUOTES);
        session(['userName'=>$name]);

        return view('pages.userNameUpdate');
    }

    public function upd(Request $request){
        $md=new User();

        $inUser = session()->get('inUser');
        $user_id = $inUser[0]->id;
        //変更希望の名前取得
        $name = $request->input('name');

        //更新処理
        $md->updName($user_id,$name);

        return view('pages.taskManagement');

    }
}
