<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //ユーザー検索SQL
    // public function searchUser($name , $hash_pass){
    //     $data = DB::select('select * from users where del_flg=0 and name = :name and password=:password',[':name'=>$name,':password'=>$hash_pass]);
    //     return $data;
    // }
    public function userAll(){
        $data = DB::select('select * from users where del_flg=0');
        return $data;
    }

    //ユーザー検索SQL パスワード忘れた時のやつ
    public function searchUserSeacret($name){
        $data = DB::select('select * from users where del_flg=0 and name = :name',[':name'=>$name]);
        return $data;
    }
    //ユーザー検索SQL idで検索するやつ
    public function searchUserId($id){
        $data = DB::select('select * from users where del_flg=0 and id = :id',[':id'=>$id]);
        return $data;
    }

    //ユーザー検索SQL 秘密の質問に答えてもらった時のやつ
    public function answerCheck($name,$answer){
        $data = DB::select('select * from users where del_flg=0 and name = :name and answer = :answer',[':name'=>$name,'answer'=>$answer]);
        return $data;
    }

    //ユーザー登録SQL
    public function registerUser($name , $password , $answer){
        $data = DB::insert('insert into users (name , password ,answer)values(:name , :password , :answer)'
    ,[':name'=>$name,':password'=>$password , ':answer'=>$answer]);
    return $data;
    }

    //パスワード変更SQL
    public function updatePass($id,$password){
        $data = DB::update('update users set password=:password where del_flg=0 and id=:id',[':password'=>$password,':id'=>$id]);
    }

    //Goal設定終わってるかの確認SQL
    public function checkGoal($id){
        $data =DB::select('SELECT u.name , g.goal , g.reason1 , g.reason2 , g.reason3 , g.want  
        FROM users u 
        JOIN goals g ON u.id=g.user_id
        WHERE u.del_flg=0 and u.id=:id',[':id'=>$id]);
        return $data;
    }

    //名前の更新処理
    public function updName($user_id,$name){
        DB::update('update users set name=:name where id=:user_id',[':user_id'=>$user_id,':name'=>$name]);
    }

    

}
