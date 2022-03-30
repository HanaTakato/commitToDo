<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{

    //user_idのRoomが存在するか確認
    public function selectRoomId($user_id){
        $data = DB::select('select id from rooms where del_flg=0 and user_id=:user_id',[':user_id'=>$user_id]);
        return $data;
    }

    //user_idを元にRoom作成
    public function createRoom($user_id){
        $data = DB::insert('insert into rooms (user_id) values(:user_id)',[':user_id'=>$user_id]);
    }

    //room_idを元にチャット内容取得
    public function selectChat($room_id){
        $data = DB::select('select r.id, rc.user_id , rc.content from rooms r
        join room_contents rc on r.id=rc.room_id
        where r.del_flg=0 and rc.room_id=:room_id',[':room_id'=>$room_id]);
        return $data;
    }


    //
}
