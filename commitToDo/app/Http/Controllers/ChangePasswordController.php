<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use stdClass;

class ChangePasswordController extends Controller
{
    //
    public function changePassword(Request $request)
    {
        $md = new User();

        //POST値のname取得
        $name = $request['name'];
        $answer = $request['answer'];

        if ($answer == '' || $answer == null) {

            session(['answer_er' => '秘密の質問の答えが未入力でした。']);
            return redirect('/seacretQ.php');
            exit;
        }

        //エラー内容の初期化、削除
        session()->flush();

        //入力されたユーザー名をもとにユーザーが存在するか確認
        $params = $md->searchUserSeacret($name);


        $answer_check = [];
        $flg = 0;
        foreach ($params as $param) {
            array_push($answer_check, $param->answer);
        }
        // dd($answer_check);
        for ($i = 0; $i < count($answer_check); $i++) {
            if ($answer == $answer_check[$i]) {
                //該当アカウントのパスワード変更画面に移動する
                $checks = $md->answerCheck($name, $answer); //名前と秘密の答えでユーザー情報をとってくる

                return view('pages.changePassword', [ //該当ユーザーの情報を保持して次のページに移動
                    'id' => $checks[0]->id //該当ユーザーのidを送る
                ]);
            } elseif (!($answer == $answer_check[$i])) {
                //質問の答えが一致するものがなかった時にリダイレクトフラグ取得
                $flg += 1;
            }
        }
        if ($flg == count($answer_check)) {
            session('answerCheck_er', '秘密の質問の答えが違うよ！');
            return redirect('seacretQ.php');//結局userNameに遷移する。
            exit;
        }
    }

    public function get()
    {
        return redirect('userName.php');
        exit;
    }
}
