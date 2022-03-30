<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class SeacretQController extends Controller
{
    //秘密の質問に遷移するか、userNameにリダイレクトするかの処理
    public function seacretQ(Request $request){
        $md=new User();

          //エラー内容の初期化、削除
          session()->flush();

        //POST値のname取得してバリデーション
        $name=$request['name'];
        if($name == null || $name==""){
            session(['name_er'=>'ユーザー名は必須入力です。']);
        }

        //入力されたユーザー名をもとにユーザーが存在するか確認
        $params=$md->searchUserSeacret($name);

        if(!($params==[])){
            return view('pages.seacretQ',[
                'name'=>$name
            ]);
        }elseif($params==[]){
            session(['exist_er'=>'ユーザーが見つかりませんでした']);
            return redirect('/userName.php');
            exit;
        }

    }

    public function getQ(){
        return redirect('/userName.php');
        exit;

    }
}
