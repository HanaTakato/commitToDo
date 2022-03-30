<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Room;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    //ユーザーの登録処理
    public function registerUser(Request $request){

        $md=new User();
        $md2 = new Room();

        //セッションにある入力パスワード取得
        $pa=session()->get('p_regi');
    
        //セッション内初期化
        session()->flush();

            //バリデーションチェック
            $name=$request['name'];
            $password=$request['hash'];
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

            //エラーがある場合、リダイレクト
            if(session()->has('password_er') || session()->has('name_er') ||session()->has('answer_er') ){
                return redirect('newUser.php');
                exit;
            }



              
                //登録処理
                $md->registerUser($name,$password,$answer);

                $user=$md->searchUserSeacret($name);
                for($i=0;$i<count($user);$i++){
                    $pass=$user[$i]->password;
                    // if( Hash::check($pass,$hash)){
                    if( password_verify($pa,$pass)){
                        $user_id1=$user[$i]->id;
                        //パスワード一致したなら
                        $user1=$md->searchUserId($user_id1);
                        // dd($user1);
                        $user_id=$user1[0]->id;
                        $md2->createRoom($user_id);
                        $signUser=$md->searchUserId($user_id);
                        session(['inUser'=>$signUser]);
                        break;
                    }
                    
                }

                //アカウント登録と同時にチャット部屋も作る
                return view('pages.registerUser');
            
    }

    //直で入ってこようとする遷移はリダイレクト
    public function get(){
        return redirect('signIn.php');
    }

}
