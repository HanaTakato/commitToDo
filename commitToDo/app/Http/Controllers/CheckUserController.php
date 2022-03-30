<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CheckUserController extends Controller
{
    //新規登録内容を受け取って新規登録可能か確認する処理
    public function checkUser(Request $request){
        $md=new User();

        //バリデーションチェック
        $name=$request['name'];
        $password=$request['password'];
        $answer=$request['answer'];

        if($name == null || $name==""){
            session(['name_er'=>'ユーザー名は必須入力です。']);
        }
        if($password == null || $password==""){
            session(['password_er'=>'パスワードは必須入力です。']);
        }
        if($answer == null || $answer==""){
            session(['answer_er'=>'秘密の答えは必須入力です。']);
        }

        if(session()->has('name_er') || session()->has('password_er') || session()->has('answer_er') ){
            return redirect('newUser.php');
            exit;
        }

        $password=htmlspecialchars($password, ENT_QUOTES);
        session(['p_regi'=>$password]);
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
            return redirect('/newUser.php');
            exit;  
                }
                    
            }

            //パスワードの文字数分●を送る
            $pass_cnt=strlen($password);
            $pass_val="";
            for($i=0;$i<$pass_cnt;$i++){
                $pass_val.="●";
            }

               //存在しなければcheckUserに値を保持して遷移
               return view('pages.checkUser',[
                'name'=>$name,
                'pass_val'=>$pass_val,
                'hash'=>$hash,
                'answer'=>$answer
            ]);

    
    }
    public function get(){
        return redirect('newUser.php');
    }
}
