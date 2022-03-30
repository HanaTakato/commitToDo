<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FinPasswordController extends Controller
{
    //パスワード変更処理
    public function finPassword(Request $request){

        $md=new User();

          //エラー内容の初期化、削除
          session()->flush();

        //POST値のname取得
        $password=$request['password'];
        $id=$request['id'];

        if($password == null || $password==""){
            session(['password_er'=>'パスワードは必須入力です。']);
        }

        if(session()->has('password_er')){
         //エラーがあればリダイレクト
         return redirect('changePassword.php');//結局userName
         exit;
        }

        //idをもとにユーザーデータ取得
        $params=$md->searchUserId($id);

        //ユーザー名を取得
        $name=$params[0]->name;

         //パスワードハッシュ化
         $hash=Hash::make($password);

         //名前が同じユーザーを取得してパスワード比較
         $user=$md->searchUserSeacret($name);
             for($i=0;$i<count($user);$i++){
                 $pass=$user[$i]->password;
 
                 // if( Hash::check($pass,$hash)){
                 if( password_verify($password,$pass)){
                     //存在する場合はnewUser.phpにリダイレクトする
             session(['search_er'=>'このユーザー名とパスワードの組み合わせは使えません']);
             return redirect('/changePassword.php');
             exit;  
                 }
                     
             }
        
        $md->updatePass($id,$hash);

        //サインインするユーザーをセッションに格納
        $inUser=$md->searchUserId($id);
        session(['inUser'=>$inUser]);

        //アップデート完了したらfinPasswordにページ遷移
        return view('pages.finPassword');
    }

    public function get(){
        return redirect('/changePassword.php');
        exit;
    }
}
