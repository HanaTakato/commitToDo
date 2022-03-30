<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TasksAjaxController extends Controller
{
    //
    //データを登録
    public function insertTask(Request $request)
    {
        $md = new Task();
        $inUser = session()->get('inUser');

        //ユーザーIDとタスク内容取得
        $user_id = $inUser[0]->id;
        $task = $request->input('task');
        $deadline = $request->input('date');

        if($deadline=="" || $deadline==null){
            //登録処理
            $md->insertTask($user_id, $task);
        }elseif(!($deadline=="") || !($deadline==null)){
            $md->insertTaskDeadline($user_id,$task,$deadline);
        }

        //内容取得処理
        $data1 = $md->selectTask($user_id);
        for($i=0;$i<count($data1);$i++){
            $task=$data1[$i]->task;
            $sani=htmlspecialchars($task, ENT_QUOTES);
            $data1[$i]->task=$sani;            
        }

        // 取得したタスク内容をセッションに格納
        session(['task' => $data1]);



        $data1 = ['task' => $data1];
        return $data1;

        // return response()->json([
        //     'code' => '1',
        //     'name' => 'eigyou'
        //  ]);
    }

    public function selectTask()
    {
        $md = new Task();
        $inUser = session()->get('inUser');

        //ユーザーIDとタスク内容取得
        $user_id = $inUser[0]->id;

        //内容取得処理
        $data1 = $md->selectTask($user_id);
        for($i=0;$i<count($data1);$i++){
            $task=$data1[$i]->task;
            $sani=htmlspecialchars($task, ENT_QUOTES);
            $data1[$i]->task=$sani;            
        }

        //取得したタスク内容をセッションに格納
        session(['task' => $data1]);



        $data1 = ['task' => $data1];
        return $data1;
    }

    public function del(Request $request)
    {
        $md = new Task();
        $inUser = session()->get('inUser');

        //ユーザーIDとタスク内容取得
        $user_id = $inUser[0]->id;
        $task_id = $request->input('del');

        $md->delTask($task_id, $user_id);

         //内容取得処理
         $data1 = $md->selectTask($user_id);
         for($i=0;$i<count($data1);$i++){
            $task=$data1[$i]->task;
            $sani=htmlspecialchars($task, ENT_QUOTES);
            $data1[$i]->task=$sani;            
        }

         // 取得したタスク内容をセッションに格納
         session(['task' => $data1]);
 
         $data1 = ['task' => $data1];
         return $data1;
    }

    public function upd(Request $request)
    {
        $md = new Task();
        $inUser = session()->get('inUser');

        //ユーザーIDとタスク内容取得
        $user_id = $inUser[0]->id;
        $task_id = $request->input('upd');
        $taskval = $request->input('data');

        //データをアップデート
        $md->updTask($task_id, $user_id,$taskval);

        //内容取得処理
        $data1 = $md->selectTask($user_id);
        for($i=0;$i<count($data1);$i++){
            $task=$data1[$i]->task;
            $sani=htmlspecialchars($task, ENT_QUOTES);
            $data1[$i]->task=$sani;            
        }

        // 取得したタスク内容をセッションに格納
        session(['task' => $data1]);

        $data1 = ['task' => $data1];
        return $data1;
    }

    public function comp(Request $request){
        $md = new Task();
        $inUser = session()->get('inUser');

        //ユーザーIDとタスク内容取得
        $user_id = $inUser[0]->id;
        $task_id = $request->input('taskId');

        $md->compTask($task_id,$user_id);

        //内容取得処理
        $data1 = $md->selectTask($user_id);
        for($i=0;$i<count($data1);$i++){
            $task=$data1[$i]->task;
            $sani=htmlspecialchars($task, ENT_QUOTES);
            $data1[$i]->task=$sani;            
        }

        // 取得したタスク内容をセッションに格納
        session(['task' => $data1]);

        $data1 = ['task' => $data1];
        return $data1;
    }

    public function completeView(){
        $md = new Task();
        $inUser = session()->get('inUser');

        //ユーザーIDとタスク内容取得
        $user_id = $inUser[0]->id;

        //内容取得処理
        $data1 = $md->commitTask($user_id);
        for($i=0;$i<count($data1);$i++){
            $task=$data1[$i]->task;
            $sani=htmlspecialchars($task, ENT_QUOTES);
            $data1[$i]->task=$sani;            
        }

        //取得したタスク内容をセッションに格納
        session(['task' => $data1]);



        $data1 = ['task' => $data1];
        return $data1;

    }
    public function adminCompleteView(){
        $md = new Task();

        //別のセッション名でユーザーID取得
        $user_id = session()->get('checkCompId'); 

        //内容取得処理
        $data1 = $md->commitTask($user_id);
        for($i=0;$i<count($data1);$i++){
            $task=$data1[$i]->task;
            $sani=htmlspecialchars($task, ENT_QUOTES);
            $data1[$i]->task=$sani;            
        }

        //取得したタスク内容をセッションに格納
        session(['task' => $data1]);



        $data1 = ['task' => $data1];
        return $data1;

    }


}
