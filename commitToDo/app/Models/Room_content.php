<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room_content extends Model
{
    //room_id,user_id,contentsチャット内容登録
    public function insertChat($room_id,$user_id,$content){
        $data=DB::insert('insert into room_contents (room_id,user_id,content)values(:room_id,:user_id,:content)',[':room_id'=>$room_id,':user_id'=>$user_id,':content'=>$content]);
    }

   
}
