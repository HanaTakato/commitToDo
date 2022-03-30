<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function admin(){
        return view('pages.admin');
    }

    //ユーザー取得
    public function selectUser(){
        
        $inUser = session()->get('inUser');
        $user_id = $inUser[0]->id;

        $data = DB::select('select * from users where del_flg=0 and id != :id',[':id'=>$user_id]);

        $data = ['data' => $data];
        return $data;

    }
    public function delUser(Request $request){
        $user_id = $request->input('admin_del');

        $inUser = session()->get('inUser');
        $admin_id = $inUser[0]->id;

        //delflgに値を格納していく
        //usersテーブル
        DB::update('update users set del_flg=1 where id=:user_id',[':user_id'=>$user_id]);
        //goalsテーブル
        DB::update('update goals set del_flg=1 where user_id=:user_id',[':user_id'=>$user_id]);
        //tasksテーブル
        DB::update('update tasks set del_flg=1 where user_id=:user_id',[':user_id'=>$user_id]);
        //rooms
        // DB::insert('insert into rooms (del_flg)values(1) where user_id=:user_id',[':user_id'=>$user_id]);
        //room_content
        // DB::insert('insert into room_contents (del_flg)values(1) where user_id=:user_id',[':user_id'=>$user_id]);
        

        //削除処理完了後の処理
        $data = DB::select('select * from users where del_flg=0 and id != :id',[':id'=>$admin_id]);
        $data = ['data' => $data];
        return $data;

    }

    public function chat(Request $request){
        $user_id = $request->input('id');
        session(['chat_user_id'=>$user_id]);


        return view('pages.admin_chat');
    }

    public function adminComp(Request $request){

        if(!(session()->has('inUser'))){
            return redirect('signIn.php');

        }

        $user_id = $request->input('checkCompId');
        session(['checkCompId'=>$user_id]);


        return view('pages.adminCompCheck');
    }
}
