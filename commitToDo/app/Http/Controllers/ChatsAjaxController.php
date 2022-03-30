<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Room_content;
use Illuminate\Http\Request;

class ChatsAjaxController extends Controller
{
    //チャット登録、表示
    public function chatsPost(Request $request)
    {
        $md = new Room();
        $md2 = new Room_content();
        $inUser = session()->get('inUser');

        $user_id = $inUser[0]->id;
        $content = $request->input('chat_contents');

        //Roomテーブルに、user_idのRoomが存在するか確認->room_id取得
        $room_user = $md->selectRoomId($user_id);

        $room_id = $room_user[0]->id;

        // //room_idとuser_idとcontentを使ってチャット内容を登録する
        $md2->insertChat($room_id, $user_id, $content);

        //取得したroomIDでチャット内容取得
        $data1 = $md->selectChat($room_id);

        for($i=0;$i<count($data1);$i++){
            $chat=$data1[$i]->content;
            $sani=htmlspecialchars($chat, ENT_QUOTES);
            $data1[$i]->content=$sani;
            
        }
        
        // 取得したタスク内容をセッションに格納
        session(['chat' => $data1]);

        $data1 = ['chat' => $data1];
        return $data1;
    }
    public function adminChatsPost(Request $request)
    {
        $md = new Room();
        $md2 = new Room_content();
        $user_id = session()->get('chat_user_id');
        $content = $request->input('chat_contents');

        //Roomテーブルに、user_idのRoomが存在するか確認->room_id取得
        $room_user = $md->selectRoomId($user_id);

        $room_id = $room_user[0]->id;
        $admin_id=0;

        // //room_idとuser_idとcontentを使ってチャット内容を登録する
        $md2->insertChat($room_id, $admin_id, $content);

        //取得したroomIDでチャット内容取得
        $data1 = $md->selectChat($room_id);

        for($i=0;$i<count($data1);$i++){
            $chat=$data1[$i]->content;
            $sani=htmlspecialchars($chat, ENT_QUOTES);
            $data1[$i]->content=$sani;
            
        }

        // 取得したタスク内容をセッションに格納
        session(['chat' => $data1]);

        $data1 = ['chat' => $data1];
        return $data1;
    }

    //チャット内容取得
    public function selectChat()
    {
        $md = new Room();
        $inUser = session()->get('inUser');
        $user_id = $inUser[0]->id;

        //Roomテーブルに、user_idのRoomが存在するか確認->room_id取得
        $room_user = $md->selectRoomId($user_id);
        $room_id = $room_user[0]->id;

        //取得したroomIDでチャット内容取得
        $data1 = $md->selectChat($room_id);

        for($i=0;$i<count($data1);$i++){
            $chat=$data1[$i]->content;
            $sani=htmlspecialchars($chat, ENT_QUOTES);
            $data1[$i]->content=$sani;
            
        }

        // 取得したタスク内容をセッションに格納
        session(['chat' => $data1]);

        $data1 = ['chat' => $data1];
        return $data1;
    }
    //チャット内容取得
    public function adminChat()
    {
        $md = new Room();
        $user_id = session()->get('chat_user_id');

        //Roomテーブルに、user_idのRoomが存在するか確認->room_id取得
        $room_user = $md->selectRoomId($user_id);
        $room_id = $room_user[0]->id;

        //取得したroomIDでチャット内容取得
        $data1 = $md->selectChat($room_id);

        for($i=0;$i<count($data1);$i++){
            $chat=$data1[$i]->content;
            $sani=htmlspecialchars($chat, ENT_QUOTES);
            $data1[$i]->content=$sani;
            
        }

        // 取得したタスク内容をセッションに格納
        session(['chat' => $data1]);

        $data1 = ['chat' => $data1];
        return $data1;
    }

   
}
