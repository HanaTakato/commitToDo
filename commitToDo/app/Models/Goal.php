<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    
    //Goalを登録するSQL
    public function registerAllR1($id,$goal,$reason1,$want){
        $data=DB::insert('insert into goals (user_id , goal , reason1 , want) 
        values (:user_id , :goal , :reason1 , :want)',
        [':user_id'=>$id ,':goal'=>$goal , ':reason1'=>$reason1 ,':want'=>$want]);
    }
    public function registerAllR2($id,$goal,$reason1,$reason2,$want){
        $data=DB::insert('insert into goals (user_id , goal , reason1 , reason2 , want) 
        values (:user_id , :goal , :reason1 , :reason2  , :want)',
        [':user_id'=>$id ,':goal'=>$goal , ':reason1'=>$reason1 , ':reason2'=>$reason2 ,':want' => $want ]);
    }
    public function registerAllR3($id,$goal,$reason1,$reason2,$reason3,$want){
        $data=DB::insert('insert into goals (user_id , goal , reason1 , reason2 , reason3 , want) 
        values (:user_id , :goal , :reason1, :reason2 , :reason3  , :want)',
        [':user_id'=>$id ,':goal'=>$goal , ':reason1'=>$reason1 , ':reason2'=>$reason2, ':reason3'=>$reason3 ,':want'=>$want]);
    }

    //登録している内容をユーザーIDを元に取得
    public function selectGoals($user_id){
        $data=DB::select('select * from goals where del_flg=0 and user_id=:user_id',[':user_id'=>$user_id]);
        return $data;
    }
    

    //登録している内容を更新
    public function updGoals($user_id,$goal,$reason1,$reason2,$reason3,$image){
        DB::update('update goals set goal=:goal , reason1=:reason1 ,reason2=:reason2
         ,reason3=:reason3 ,want=:image where user_id=:user_id',[':user_id'=>$user_id,
         ':goal'=>$goal,':reason1'=>$reason1,':reason2'=>$reason2,':reason3'=>$reason3,
         ':image'=>$image]);
    }
}
