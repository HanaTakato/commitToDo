<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    //タスク登録
    public function insertTask($id,$task){
        $data = DB::insert('insert into tasks  ( user_id , task) values(:user_id , :task )',[':user_id'=>$id,':task'=>$task]);
    }
    public function insertTaskDeadline($id,$task,$deadline){
        $data = DB::insert('insert into tasks  ( user_id , task ,deadline) values(:user_id , :task ,:deadline )',[':user_id'=>$id,':task'=>$task,':deadline'=>$deadline]);
    }


    //タスク内容取得
    public function selectTask($id){
        $data = DB::select('select * from tasks where del_flg=0 and commit_flg = 0 and user_id=:user_id order by deadline asc',[':user_id'=>$id]);
        return $data;
    }
    public function commitTask($id){
        $data = DB::select('select * from tasks where del_flg=0 and commit_flg = 1 and user_id=:user_id',[':user_id'=>$id]);
        return $data;
    }

    //ユーザーidとタスクidをもとにタスク削除
    public function delTask($task_id,$user_id){
        $data = DB::delete('delete from tasks where id=:id and user_id=:user_id',[':id'=>$task_id,':user_id'=>$user_id]);
    }

    //編集更新
    public function updTask($task_id,$user_id,$task){
        DB::update('update tasks set task=:task where id=:id and user_id=:user_id',[':id'=>$task_id,':user_id'=>$user_id,':task'=>$task]);

    }

    //compflg編集
    public function compTask($task_id,$user_id){
        DB::update('update tasks set commit_flg=1 where id=:id and user_id=:user_id',[':id'=>$task_id,':user_id'=>$user_id]);

    }
    //compキャンセル
    public function compCancelTask($task_id,$user_id){
        DB::update('update tasks set commit_flg=0 where id=:id and user_id=:user_id',[':id'=>$task_id,':user_id'=>$user_id]);

    }

}
