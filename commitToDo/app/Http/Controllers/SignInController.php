<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignInController extends Controller
{
    //サインインする時の処理
    public function signIn(Request $request){
        $md=new User();

        //サインインしていてもここで初期化する
        session()->flush();
        

        //バリデーションチェック
        $name=$request['name'];
        $password=$request['password'];

        if($name == null || $name==""){
            session(['name_er'=>'ユーザー名は必須入力です。']);
        }
        if($password == null || $password==""){
            session(['password_er'=>'パスワードは必須入力です。']);
        }

         //名前が同じユーザーを取得してパスワード比較
         $user=$md->searchUserSeacret($name);
         $params=[];
         if(isset($user)){

             for($i=0;$i<count($user);$i++){
                 $pass=$user[$i]->password;
    
                 if( Hash::check($password,$pass)){
                    $user_id=$user[$i]->id;
                    $params=$md->searchUserId($user_id);  
                 }elseif(!(Hash::check($password,$pass))){
                     return redirect('signIn.php');
                     exit;

                 }
                     
             }
         }elseif($user=="" || $user==null){
             return redirect('signIn.php');
             exit;
         }

        


        //エラーがあるならリダイレクト
        if(session()->has('name_er') || session()->has('password_er') ||session()->has('search_er') ){
            return redirect('/signIn.php');
            exit;   
        }elseif(session()->has('name_er')==false && session()->has('password_er')==false && session()->has('search_er')==false){
            //エラーがなければ
            //ユーザー情報をセッションに保持してStep1GoalControllerへ
            session(['inUser'=>$params]);

            //設定できている場合、
            return redirect('/step1Goal.php');
            exit;   
        }



    }

    public function sign(){
        if(session()->has('inUser')){
            return redirect('/step1Goal.php');
            exit;
        }else{
            return redirect('signIn.php');
        }
    }
}
